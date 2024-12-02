<?php

namespace App\Http\Requests\Auth;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|string|email|max:255|unique:users',
            'name' => 'required|string',
            'password' => 'required|string|min:6|confirmed',
        ];
    }

    public function messages()
    {
        return [
            'email.required'=>'L\'email est requis',
            'email.string'=>'L\'email n\'est pas valide',
            'email.email'=>'L\'email n\'est pas valides',
            'email.unique'=>'L\'email est existe déjà',
            'name.string'=>'Le nom n\'est pas valide',
            'password.required'=>'Le mot de passe est requis',
            'password.min'=>'Le mot de passe doit être au moins 6 caractères',
            'password.confirmed'=>'Les mots de passe ne sont pas conformes',
        ];
    }
}
