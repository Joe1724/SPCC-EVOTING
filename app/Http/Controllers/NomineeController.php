<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Nominee;
use App\Models\Setting;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\Auth;

class NomineeController extends BaseController
{
    public function index()
{
    $setting = Setting::first(); // Fetch voting status

    if (Auth::user()->role == 'admin') {
        // Admin view (grouped by position)
        $nominees = Nominee::all()->groupBy('position');
        return view('admin.nominees.index', compact('nominees', 'setting'));
    } else {
        // Voter view (simple list)
        $nominees = Nominee::all();
        return view('voter.nominees', compact('nominees', 'setting'));
    }
}

    public function create()
    {
        return view('admin.nominees.create');
    }

    public function store(Request $request)
{
    $data = $request->validate([
        'first_name' => 'required|string|max:255',
        'last_name' => 'required|string|max:255',
        'course' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'partylist' => 'required|string|max:255',
        'description' => 'required|string',
        'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
    ]);

    // Handle image upload
    if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('nominee_images', 'public');
        $data['image'] = $imagePath;
    }

    Nominee::create($data);

    return redirect()->route('admin.nominees.index')->with('success', 'Nominee added successfully.');
}

    public function edit($id)
    {
        $nominee = Nominee::findOrFail($id);
        return view('admin.nominees.edit', compact('nominee'));
    }

    public function update(Request $request, $id)
    {
        $nominee = Nominee::findOrFail($id);

        $nominee->update($request->all());

        if ($request->hasFile('image')) {
            $imagePath = $request->file('image')->store('nominees', 'public');
            $nominee->update(['image' => $imagePath]);
        }

        return redirect()->route('admin.nominees.index')->with('success', 'Nominee updated successfully!');
    }
}
