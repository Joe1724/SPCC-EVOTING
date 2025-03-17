<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Election;

class ElectionController extends Controller
{
    public function index()
    {
        $elections = Election::all();
        return view('elections.index', compact('elections'));
    }

    public function create()
    {
        return view('elections.create');
    }

        public function store(Request $request)
    {
        Election::create([
            'name' => $request->name,
            'status' => $request->status ?? 'Upcoming',
            'start' => $request->start,
            'end' => $request->end,
        ]);

        return redirect()->route('elections.index')->with('success', 'Election added successfully!');
    }


    public function edit($id)
    {
        $election = Election::findOrFail($id);
        return view('elections.edit', compact('election'));
    }

    public function update(Request $request, $id)
    {
        $election = Election::findOrFail($id);
        $election->update($request->all());
        return redirect()->route('elections.index')->with('success', 'Election updated successfully!');
    }

    public function destroy($id)
    {
        $election = Election::findOrFail($id);
        $election->delete();
        return redirect()->route('elections.index')->with('success', 'Election deleted successfully!');
    }
}
