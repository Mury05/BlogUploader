<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreArticleRequest extends FormRequest
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
            'content' => ['string', 'nullable'],
            'image' => ['nullable', 'image', 'mimes:jpeg,png,jpg,gif,svg', 'max:2048'],
            'filepdf' => ['nullable', 'file', 'mimes:pdf']
        ];
    }

    public function messages()
    {
        return [
            'title.required' => 'Le titre est obligatoire.',
            'title.string' => 'Le titre doit être une chaîne de caractères.',
            'content.string' => 'Le contenu doit être une chaîne de caractères.',
            'image.image' => 'Le fichier sélectionné doit être une image.',
            'image.mimes' => 'L\'image doit être au format jpeg, png, jpg, gif ou svg.',
            'image.max' => 'L\'image ne doit pas dépasser 2 Mo.',
            'filepdf.file' => 'Le fichier doit être un fichier valide.',
            'filepdf.mimes' => 'Le fichier PDF doit être au format pdf.',
        ];
    }


}
