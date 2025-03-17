<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Partylist;
use App\Models\Position;

class PartylistController extends Controller
{
    public function index()
    {
        $partylists = Partylist::all();
        return view('partylists.index', compact('partylists'));
    }

    public function create()
    {
        return view('partylists.create');
    }

    public function store(Request $request)
{
    $request->validate([
        'name' => 'required|string|max:255',
        'election_id' => 'required|exists:elections,id',
    ]);

    Position::create($request->all());

    return redirect()->back()->with('success', 'Position added successfully!');
}


    public function edit($id)
    {
        $partylist = Partylist::findOrFail($id);
        return view('partylists.edit', compact('partylist'));
    }

    public function update(Request $request, $id)
    {
        $partylist = Partylist::findOrFail($id);
        $partylist->update($request->all());
        return redirect()->route('partylists.index')->with('success', 'Partylist updated successfully!');
    }

    public function destroy($id)
    {
        $partylist = Partylist::findOrFail($id);
        $partylist->delete();
        return redirect()->route('partylists.index')->with('success', 'Partylist deleted successfully!');
    }
}
