<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use App\Models\Voter;
use App\Models\Result;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use PDF;  // Import the PDF facade

class InformationController extends Controller
{
    public function __construct()
    {
        $this->middleware('admin');
    }

    public function index()
    {
        if (Auth::user()->role !== 'admin') {
            return redirect()->back()->with('error', 'You do not have permission to access this page.');
        }

        $setting = Setting::first();
        $status = ($setting && $setting->status == 1) ? 'Open' : 'Closed';

        $totalVoters = Voter::count();
        $voted = Voter::where('is_voted', true)->count();
        $notVoted = $totalVoters - $voted;

        $results = Result::with('nominee')->get();

        return view('admin.information', compact('status', 'totalVoters', 'voted', 'notVoted', 'results'));
    }

    // Method to generate and export PDF
    public function exportPdf()
    {
        $setting = Setting::first();
        $status = ($setting && $setting->status == 1) ? 'Open' : 'Closed';

        $totalVoters = Voter::count();
        $voted = Voter::where('is_voted', true)->count();
        $notVoted = $totalVoters - $voted;

        $results = Result::with('nominee')->get();

        // Load the HTML content from a view and generate PDF
        $pdf = PDF::loadView('admin.pdf_information', compact('status', 'totalVoters', 'voted', 'notVoted', 'results'));

        // Download the PDF file
        return $pdf->download('voting_information.pdf');
    }
}
