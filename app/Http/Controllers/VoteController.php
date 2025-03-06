<?php

namespace App\Http\Controllers;

use App\Models\Result;
use App\Models\Vote;
use Illuminate\Http\Request;

class VoteController extends Controller {
    public function vote(Request $request) {
        $request->validate([
            'user_id' => 'required',
            'nominee_id' => 'required',
            'election_id' => 'required',
            'position_id' => 'required'
        ]);

        $existingVote = Result::where('user_id', $request->user_id)
            ->where('election_id', $request->election_id)
            ->where('position_id', $request->position_id)
            ->first();

        if ($existingVote) {
            return response()->json(['message' => 'User has already voted for this position'], 400);
        }

        Result::create($request->all());
        Vote::where('nominee_id', $request->nominee_id)->increment('count');

        return response()->json(['message' => 'Vote cast successfully'], 200);
    }

    public function results($election_id) {
        $results = Vote::where('election_id', $election_id)
            ->orderByDesc('count')
            ->get();
        return response()->json($results);
    }
}

