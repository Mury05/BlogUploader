<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\ProfileRequest;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('auth.login');
    }

    /**
     * Summary of authenticate
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function authenticate(Request $request): RedirectResponse
    {
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Authentication passed...
            return redirect()->intended('/');
        }
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }

    /**
     * Fonction de déconnexion
     * @return RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function logout()
    {
        Auth::logout();

        return redirect('/');
    }

    public function edit()
    {
        return view('auth.profile', [
            'user' => Auth::user()
        ]);
    }

    public function update(ProfileRequest $request)
    {

        $user = Auth::user();

        // Vérifiez si l'utilisateur est bien un objet User
        if (!$user instanceof User) {
            return redirect()->route('profile.edit')->withErrors('Utilisateur non trouvé.');
        }

        // Mettre à jour les informations de l'utilisateur
        $user->name = $request->name;
        $user->email = $request->email;

        // Gérer l'upload de l'avatar
        if ($request->hasFile('avatar')) {
            $user->avatar = $request->file('avatar')->store('avatars', 'public');
        }

        // Enregistrer les modifications
        $user->save(); // Vérifiez si save() est reconnu ici

        return redirect()->route('articles.index')->with('success_message', 'Profil mis à jour avec succès!');
    }
}
