<?php

namespace App\Http\Controllers;

use App\Models\Nominee;
use Illuminate\Http\Request;

class ResultController extends Controller
{
    public function index()
    {
        $results = Nominee::withCount('votes')->orderBy('votes_count', 'desc')->get();
        return view('results.index', compact('results'));
    }
}

