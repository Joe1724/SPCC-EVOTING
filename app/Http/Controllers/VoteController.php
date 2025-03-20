<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vote;
use App\Models\Nominee;
use App\Models\Setting;
use App\Models\Settings;
use Illuminate\Routing\Controller;

class VoteController extends Controller
{
    public function index()
    {
        $votes = Vote::with('nominee')->get();
        return view('votes.index', compact('votes'));
    }

    public function store(Request $request)
    {
        $settings = Setting::first();

        if (!$settings || $settings->status != 1) {
            return redirect()->back()->with('error', 'Voting is currently closed.');
        }

        // Find or create vote record
        $vote = Vote::where('nominee_id', $request->nominee_id)->first();
        if ($vote) {
            $vote->increment('count');
        } else {
            Vote::create([
                'nominee_id' => $request->nominee_id,
                'count' => 1,
            ]);
        }

        return redirect()->route('votes.index')->with('success', 'Vote submitted successfully!');
    }
}
