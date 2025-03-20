<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Setting;
use Illuminate\Routing\Controller;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::first();
        return view('settings.index', compact('setting'));
    }

    public function update(Request $request)
    {
        $setting = Setting::firstOrCreate([]);
        $setting->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Voting status updated!');
    }
}
