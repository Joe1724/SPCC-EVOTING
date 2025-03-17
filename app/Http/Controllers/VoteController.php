<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Nominee;
use App\Models\Election;

class VoteController extends Controller
{
    public function index()
    {
        $votes = Vote::with('nominee', 'election')->get();
        return view('votes.index', compact('votes'));
    }

    public function create()
    {
        $nominees = Nominee::all();
        $elections = Election::all();
        return view('votes.create', compact('nominees', 'elections'));
    }

    public function store(Request $request)
    {
        $vote = Vote::where('nominee_id', $request->nominee_id)
                    ->where('election_id', $request->election_id)
                    ->first();

        if ($vote) {
            $vote->increment('count');
        } else {
            Vote::create([
                'nominee_id' => $request->nominee_id,
                'election_id' => $request->election_id,
                'count' => 1,
            ]);
        }

        return redirect()->route('votes.index')->with('success', 'Vote submitted successfully!');
    }
}
