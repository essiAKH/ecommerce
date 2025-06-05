<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller; // Importation ajoutée
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    private function checkAdmin()
    {
        if (!Auth::check()) {
            return redirect()->route('login')->with('error', 'Vous devez être connecté.');
        }

        if (!Auth::user()->isAdmin()) {
            return redirect()->route('home')->with('error', 'Accès non autorisé.');
        }

        return null;
    }

    public function edit()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $user = Auth::user();
        return view('admin.profile.edit', compact('user'));
    }

    public function update(Request $request)
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $user = Auth::user();

        $request->validate([
            'firstname' => 'required|string|max:45',
            'lastname' => 'required|string|max:45',
            'email' => 'required|email|max:45|unique:users,email,' . $user->id,
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $data = [
            'firstname' => $request->firstname,
            'lastname' => $request->lastname,
            'email' => $request->email,
        ];

        if ($request->filled('password')) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        return redirect()->route('admin.dashboard')->with('success', 'Profil mis à jour avec succès.');
    }

    public function destroy()
    {
        if ($redirect = $this->checkAdmin()) {
            return $redirect;
        }

        $user = Auth::user();
        Auth::logout();
        $user->delete();

        return redirect()->route('login')->with('success', 'Compte supprimé avec succès.');
    }
}