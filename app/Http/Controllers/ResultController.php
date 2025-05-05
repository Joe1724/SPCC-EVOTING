<?php

namespace App\Http\Controllers;

use App\Models\Nominee;
use App\Models\Result;
use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Routing\Controller;

class ResultController extends Controller
{
    public function index()
    {
        $setting = Setting::first();

if (!$setting || $setting->status != 2) {
    return redirect()->back()->with('error', 'Voting is still open. Results are not available.');
}


        // Get winners grouped by position
        $winners = Result::select('position', 'nominee_id', 'count')
            ->whereIn(DB::raw('(position, count)'), function ($query) {
                $query->select('position', DB::raw('MAX(count)'))
                    ->from('results')
                    ->groupBy('position');
            })
            ->with('nominee')
            ->get()
            ->groupBy('position');

        return view('voter.results', compact('winners'));
    }
}
