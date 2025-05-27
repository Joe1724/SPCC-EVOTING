<?php

namespace App\Http\Controllers;

use App\Models\Nominee;
use App\Models\Result;
use Illuminate\Http\Request;

class LiveCountController extends Controller
{
    public function show()
    {
        $results = Result::with('nominee')
            ->orderBy('position')
            ->orderByDesc('count')
            ->get();

        return view('livecount', compact('results'));
    }
}
