<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Election;
use App\Models\Position;
use App\Models\Nominee;
use App\Models\Partylist;
use App\Models\Result;

class ElectionController extends Controller
{
    // Show all elections in the Blade view
    public function index()
    {
        $elections = Election::orderBy('id', 'desc')->get(); // Show all elections
        return view('elections', compact('elections'));
    }

    // Show active election with details in the Blade view
    public function showActiveElection()
    {
        $election = Election::where('status', 2)->latest()->first(); // Get active election

        if (!$election) {
            return redirect()->route('elections.view')->with('error', 'No active election found.');
        }

        $positions = Position::where('election_id', $election->id)->get();
        $partylist = Partylist::where('election_id', $election->id)->get();
        $nominees = Nominee::where('election_id', $election->id)->get();
        $results  = Result::where('election_id', $election->id)->get();

        return view('elections', compact('election', 'positions', 'partylist', 'nominees', 'results'));
    }

    // Show election results in Blade
    public function showResults()
    {
        $election = Election::where('status', 3)->latest()->first();

        if (!$election) {
            return redirect()->route('elections.view')->with('error', 'No completed election found.');
        }

        $results = $this->calculateResults($election->id);
        return view('elections', compact('results', 'election'));
    }

    // Show final results for a specific election
    public function showFinalResults($id)
    {
        $election = Election::findOrFail($id);
        $results = $this->calculateResults($id);
        $positions = Position::where('election_id', $id)->get();
        $nominees = Nominee::where('election_id', $id)->get();

        return view('elections', compact('election', 'results', 'positions', 'nominees'));
    }

    // Add a new election
    public function addElection(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        Election::create([
            'name' => $request->name,
            'status' => 1, // Pending
        ]);

        return redirect()->route('elections.view')->with('success', 'Election added successfully.');
    }

    // Start an election (No authentication)
    public function startElection(Request $request)
    {
        $request->validate([
            'election_id' => 'required|exists:elections,id',
        ]);

        $election = Election::find($request->election_id);

        if (!$election || $election->status !== 1) {
            return redirect()->route('elections.view')->with('error', 'No pending election found.');
        }

        if (Nominee::where('election_id', $election->id)->count() < 1) {
            return redirect()->route('elections.view')->with('error', 'No nominees available.');
        }

        $election->update([
            'status' => 2, // Ongoing
            'start'  => now(),
        ]);

        return redirect()->route('elections.view')->with('success', 'Election started successfully.');
    }

    // Stop an election (No authentication)
    public function stopElection(Request $request)
    {
        $request->validate([
            'election_id' => 'required|exists:elections,id',
        ]);

        $election = Election::find($request->election_id);

        if (!$election || $election->status !== 2) {
            return redirect()->route('elections.view')->with('error', 'No ongoing election found.');
        }

        $election->update([
            'status' => 3, // Completed
            'end'    => now(),
        ]);

        if (!Election::where('status', 1)->exists()) {
            Election::create([
                'name'   => 'New Election',
                'status' => 1, // Pending
            ]);
        }

        return redirect()->route('elections.view')->with('success', 'Election has ended.');
    }

    // Helper function to calculate election results
    private function calculateResults($election_id)
    {
        return Result::select(DB::raw('position_id, nominee_id, COUNT(*) as votes'))
            ->where('election_id', $election_id)
            ->groupBy('position_id', 'nominee_id')
            ->orderBy('votes', 'DESC')
            ->get();
    }
}
