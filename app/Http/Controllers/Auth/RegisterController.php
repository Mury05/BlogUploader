<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class RegisterController extends Controller
{
    public function index()
    {
        return view('auth.register');
    }

    /**
     * Create a new user instance after a valid registration.
     */
    public function create(RegisterRequest $request)
    {
         // Initialiser le chemin de l'avatar
    $avatarPath = null;

    // Gérer l'upload de l'image
    if ($request->hasFile('avatar')) {
        $avatarPath = $request->file('avatar')->store('avatars', 'public');
    }

    // Créer l'utilisateur
    User::create([
        'name' => $request['name'],
        'email' => $request['email'],
        'password' => bcrypt($request['password']),
        'avatar' => $avatarPath, // Utiliser le chemin de l'avatar
    ]);

        $user = User::where('email', $request['email'])->firstOrFail();
        Auth::login($user);
        session()->flash('success_message', 'Votre compte a été crée');

        return redirect('/');
    }
}
