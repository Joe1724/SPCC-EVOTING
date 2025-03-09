<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Position;
use App\Models\Nominee;
use App\Models\Result;
use App\Models\Election;

class VoteController extends Controller
{
    public function __invoke(Request $request)
    {
        $validation = $this->validateRequest($request);

        if ($validation['status'] === 'failed') {
            return response()->json($validation);
        }

        $this->insertVote($request);

        return response()->json([
            'status' => 'success',
            'message' => 'Voted successfully',
            'result' => Result::where('voter_id', Auth::id())->get(),
        ]);
    }

    private function insertVote(Request $request)
    {
        foreach ($request->vote as $value) {
            Result::updateOrCreate([
                'voter_id' => Auth::id(),
                'election_id' => $request->election_id, // Election ID now required in request
                'position_id' => $value['position_id'],
            ], ['nominee_id' => $value['nominee_id']]);
        }
    }

    private function validNominee($id, $position_id)
    {
        return Nominee::where('id', $id)->where('position_id', $position_id)->exists();
    }

    private function isPositionExist($id)
    {
        return Position::where('id', $id)->exists();
    }

    private function voteAllPosition(Request $request)
    {
        $total_position = Position::where('election_id', $request->election_id)->count();
        return count($request->vote) >= $total_position;
    }

    private function validateRequest(Request $request)
    {
        if (!$request->has('election_id')) {
            return ['status' => 'failed', 'message' => 'Election ID is required.'];
        }

        if (!Election::where('id', $request->election_id)->exists()) {
            return ['status' => 'failed', 'message' => 'Invalid Election ID.'];
        }

        $vote = $request->vote;

        if (!$this->voteAllPosition($request)) {
            return ['status' => 'failed', 'message' => 'You must vote for all positions.'];
        }

        foreach ($vote as $value) {
            if (empty($value['position_id']) || empty($value['nominee_id'])) {
                return ['status' => 'failed', 'message' => 'You must vote for all positions.'];
            }

            if (!$this->isPositionExist($value['position_id'])) {
                return ['status' => 'failed', 'message' => 'Invalid Position.'];
            }

            if (!$this->validNominee($value['nominee_id'], $value['position_id'])) {
                $position = Position::find($value['position_id']);
                return ['status' => 'failed', 'message' => 'Invalid Nominee for ' . ($position->name ?? 'unknown') . ' position.'];
            }
        }

        return ['status' => 'success'];
    }
}
