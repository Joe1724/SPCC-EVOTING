<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Result;
use App\Models\Voter;
use App\Models\Nominee;  // Add this line to import the Nominee model
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    // Show Admin Dashboard
    public function showDashboard()
    {
        $totalUsers = User::count(); // Count all users
        $totalVoters = Voter::count(); // Count all voters
        $totalVotes = Result::sum('count'); // Sum all votes in the results table
        $totalNominees = Nominee::count(); // Count all nominees

        return view('admin.dashboard', compact('totalUsers', 'totalVoters', 'totalVotes', 'totalNominees'));

    }

    // Show Manage Users page
    public function manageUsers()
    {
        $users = User::all(); // Get all users
        return view('admin.manage_users', compact('users'));
    }

}
