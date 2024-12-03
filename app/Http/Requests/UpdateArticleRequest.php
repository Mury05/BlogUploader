<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateArticleRequest extends FormRequest
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
            'title' => ['required', 'string'],
            'body' => ['required', 'string'],
            'image' => ['image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'check' => ['nullable', 'boolean'], // Peut être null si non coché
            'filepdf' => ['nullable','file', 'mimes:pdf'], // Requis si check = 0
            'content' => ['nullable','string'], // Requis si check = 1
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Le titre est obligatoire.',
            'title.string' => 'Le titre doit être une chaîne de caractères.',
            'body.required' => 'La description est obligatoire.',
            'body.string' => 'La description doit être une chaîne de caractères.',
            'image.required' => 'L\'image de couverture est obligatoire.',
            'image.image' => 'Le fichier sélectionné doit être une image.',
            'image.mimes' => 'L\'image doit être au format jpeg, png, jpg, gif ou svg.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'content.string' => 'Le contenu doit être une chaîne de caractères.',
            'content.required_if' => 'Le contenu est requis si vous choisissez d’ajouter un contenu.',
            'filepdf.required_if' => 'Le fichier PDF est requis si vous choisissez de téléverser un fichier.',
            'filepdf.file' => 'Le fichier doit être un fichier valide.',
            'filepdf.mimes' => 'Le fichier PDF doit être au format pdf.',

        ];
    }


}
