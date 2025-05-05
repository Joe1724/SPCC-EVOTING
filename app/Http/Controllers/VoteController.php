<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nominee;
use App\Models\Result;
use App\Models\Setting;
use App\Models\Voter;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class VoteController extends Controller
{
    public function index()
{

    $nominees = Nominee::all()->groupBy('position');


    return view('voter.vote', compact('nominees'));
}


    public function create()
{

    $nominees = Nominee::all()->groupBy('position');

    return view('voter.vote', compact('nominees'));
}




    public function store(Request $request)
{

    $setting = Setting::first();
    if (!$setting || $setting->status != 1) {
        return redirect()->back()->with('error', 'Voting is currently closed.');
    }


    $voter = Voter::where('student_id', Auth::user()->student_id)->first();


    if (!$voter && Auth::user()->role === 'voter') {
        $voter = Voter::create([
            'name' => Auth::user()->name,
            'student_id' => Auth::user()->student_id,
            'role' => Auth::user()->role,
            'is_voted' => false,
        ]);
    }


    if ($voter && $voter->is_voted) {
        return redirect()->back()->with('error', 'You have already voted.');
    }


    $validationResult = $this->validateRequest($request);
    if ($validationResult['status'] === 'failed') {
        return redirect()->back()->with('error', $validationResult['message']);
    }


    DB::transaction(function () use ($request, $voter) {
        $this->insertVote($request);


        $voter->update(['is_voted' => true]);
    });

    return redirect()->route('voter.dashboard')->with('success', 'Voted successfully!');
}




    private function insertVote($request)
    {
        foreach ($request->vote as $value) {
            $result = Result::where('nominee_id', $value['nominee_id'])
                ->where('position', $value['position'])
                ->first();

            if ($result) {

                $result->increment('count');
            } else {

                Result::create([
                    'nominee_id' => $value['nominee_id'],
                    'position' => $value['position'],
                    'count' => 1
                ]);
            }
        }
    }


    private function validateRequest($request)
    {
        $result['status'] = 'failed';


        if (!isset($request->vote) || !is_array($request->vote) || count($request->vote) == 0) {
            $result['message'] = 'You must vote at least one position.';
            return $result;
        }


        foreach ($request->vote as $vote) {
            if (empty($vote['nominee_id']) || empty($vote['position'])) {
                $result['message'] = 'Each vote must have a nominee and a position.';
                return $result;
            }


            $nominee = Nominee::find($vote['nominee_id']);
            if (!$nominee) {
                $result['message'] = 'Invalid nominee selected.';
                return $result;
            }


            if ($nominee->position !== $vote['position']) {
                $result['message'] = 'Nominee does not match the selected position.';
                return $result;
            }
        }


        $result['status'] = 'success';
        return $result;
    }
}
