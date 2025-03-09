<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use App\Models\Position;

class PositionController extends Controller
{
    /**
     * Show all positions.
     */
    public function showPositionsPage()
    {
        $positions = Position::all();
        return view('positions', compact('positions'));
    }

    /**
     * Store a new position.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('positions')
            ],
        ]);

        Position::create($validatedData);

        return redirect()->back()->with('success', 'Position added successfully!');
    }

    /**
     * Update an existing position.
     */
    public function update(Request $request, Position $position)
    {
        $validatedData = $request->validate([
            'name' => [
                'required',
                Rule::unique('positions')->ignore($position->id)
            ],
        ]);

        $position->update($validatedData);

        return redirect()->back()->with('success', 'Position updated successfully!');
    }

    /**
     * Delete a position.
     */
    public function destroy(Position $position)
    {
        $position->delete();

        return redirect()->back()->with('success', 'Position deleted successfully!');
    }
}
