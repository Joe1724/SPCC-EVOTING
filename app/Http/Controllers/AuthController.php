<?php



namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class AuthController extends Controller
{
    // Show voter registration form
    public function showRegister()
    {
        return view('auth.register');
    }

    // Handle voter registration (only for voters)
    public function register(Request $request)
    {
        // Validation
        $request->validate([
            'name' => 'required|string|max:255',
            'student_id' => 'required|string|unique:users,student_id',
            'password' => 'required|string|confirmed|min:6',
        ]);

        // Create the voter user
        $user = User::create([
            'name' => $request->name,
            'student_id' => $request->student_id,
            'password' => bcrypt($request->password),
            'role' => 'voter', // Registered users are always voters
        ]);

        Auth::login($user);

        return redirect('/dashboard');
    }

    // Show login form (for all roles)
    public function showLogin()
    {
        return view('auth.login');
    }

    // Handle login
    public function login(Request $request)
    {
        $credentials = $request->only('student_id', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Redirect based on role
            if ($user->role === 'superadmin') {
                return redirect('/superadmin/dashboard');
            } elseif ($user->role === 'admin') {
                return redirect('/admin/dashboard');
            } else {
                return redirect('/dashboard');
            }
        }

        return back()->withErrors(['student_id' => 'Invalid credentials.']);
    }

    // Logout
    public function logout(Request $request)
{
    Auth::logout();

    $request->session()->invalidate();  // Invalidate the session
    $request->session()->regenerateToken(); // Regenerate CSRF token

    return redirect('/login');
}


public function showAdminLogin()
{
    return view('auth.admin_login');
}

// Handle Admin login
public function adminLogin(Request $request)
{
    // Validate login credentials for admin using email
    $credentials = $request->only('email', 'password');

    // Attempt login
    if (Auth::attempt($credentials)) {
        $user = Auth::user();

        // Check if user is an admin or superadmin
        if ($user->role === 'admin' || $user->role === 'superadmin') {
            return redirect('/admin/dashboard');
        } else {
            Auth::logout(); // Logout if user is not admin
            return back()->withErrors(['email' => 'Access denied.']);
        }
    }

    return back()->withErrors(['email' => 'Invalid credentials.']);
}


}
