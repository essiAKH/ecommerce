<?php
namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;

class AuthController extends Controller
{
    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $request->validate([
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6|confirmed',
            'roles_id' => 'required|exists:roles,id',
        ]);

        User::create([
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'roles_id' => $request->roles_id,
        ]);
       
        return redirect('/login')->with('success', 'Inscription réussie.');

    }
    public function showLogin()
    {
        return view('auth.login'); // fichier login.blade.php
    }

    public function login(Request $request)
{
    $credentials = $request->validate([
        'email' => ['required', 'email'],
        'password' => ['required'],
    ]);

    $user = User::where('email', $request->email)->with('role')->first();

    if ($user && Hash::check($request->password, $user->password)) {
        Auth::login($user);

        // Récupération du nom du rôle (ex: "admin" ou "client")
        $roleName = $user->role->role_name;

        // Redirection selon le rôle
        if ($roleName === 'admin') {
            return redirect()->route('admin.dashboard');
        } else {
            return redirect()->route('client.dashboard');
        }
    }

    return back()->withErrors([
        'email' => 'Identifiants incorrects.',
    ]);
}

public function logout()
{
    Auth::logout();
    return redirect()->route('login')->with('success', 'Déconnexion réussie.');
}

}

    


