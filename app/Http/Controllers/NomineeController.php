<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nominee;

class NomineeController extends Controller
{
        public function index()
    {
        $nominees = Nominee::all();
        return view('nominees.index', compact('nominees'));
    }


    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'course' => 'required|string|max:255',
        'student_id' => 'required|string|max:50',
        'position_id' => 'required|exists:positions,id',
        'partylist_id' => 'required|exists:partylists,id',
        'election_id' => 'required|exists:elections,id',
        'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        'description' => 'nullable|string',
        'motto' => 'nullable|string|max:255',
    ]);

    // Store the nominee
    Nominee::create($request->all());

    return redirect()->back()->with('success', 'Nominee added successfully!');
}


    public function show($id)
    {
        $nominee = Nominee::findOrFail($id);
        return response()->json($nominee);
    }

    public function update(Request $request, $id)
    {
        $nominee = Nominee::findOrFail($id);
        $nominee->update($request->all());
        return response()->json($nominee);
    }

    public function destroy($id)
    {
        $nominee = Nominee::findOrFail($id);
        $nominee->delete();
        return response()->json(['message' => 'Nominee deleted successfully']);
    }
}
