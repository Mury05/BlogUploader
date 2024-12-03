@extends('layouts.app')

@section('title', 'New-Article')

@section('header')
    <x-header />
@endsection

@section('content')
    <div class="mx-auto w-2/3 flex flex-col">
        <h1 class="my-4 text-xl text-center font-bold">Créer un nouvel article</h1>

        <form action="{{ route('articles.store') }}" method="post" enctype="multipart/form-data"
            class="border border-gray-950 p-5 rounded-md shadow-blue-500/40">
            @csrf

            {{-- Titre de l'article --}}
            @include('components.forms.input', [
                'type' => 'text',
                'name' => 'title',
                'label' => "Titre de l'article",
                'value' => old('title'),
                'class' => 'border border-green-700 p-2 rounded-md',
            ])

            {{-- Description de l'article --}}
            @include('components.forms.input', [
                'type' => 'textarea',
                'name' => 'body',
                'label' => "Description de l'article",
                'value' => old('body'),
                'class' => 'border border-green-700 p-2 rounded-md',
            ])

            <div class="flex justify-between">
                {{-- Image de couverture --}}
                @include('components.forms.input', [
                    'type' => 'file',
                    'name' => 'image',
                    'label' => 'Image de couverture',
                    'value' => old('image'),
                ])
                {{-- Checkbox pour basculer entre contenu et fichier --}}
                <div class="flex items-center mb-4">
                    <!-- Champ caché pour garantir l'envoi de '0' si la case est décochée -->
                    <input type="hidden" name="check" value="0">
                    <input id="check" type="checkbox" name="check" value="1"
                        class="w-4 h-4 border border-green-700 rounded-md"
                        onchange="toggleContent()" {{ old('check') ? 'checked' : '' }}>
                    <label for="check" class="ml-2 text-sm">Ajouter du contenu au lieu d’un fichier PDF</label>
                </div>

            </div>

            {{-- Contenu dynamique --}}
            <div id="contentField" style="display: {{ old('check') ? 'block' : 'none' }}">
                @include('components.forms.input', [
                    'type' => 'textarea',
                    'name' => 'content',
                    'id' => 'content',
                    'label' => "Contenu de l'article",
                    'value' => old('content'),
                    'class' => 'border border-green-700 p-2 rounded-md',
                ])
            </div>

            <div id="fileField" style="display: {{ old('check') ? 'none' : 'block' }}">
                @include('components.forms.input', [
                    'type' => 'file',
                    'name' => 'filepdf',
                    'label' => 'Fichier PDF de l\'article',
                    'value' => old('filepdf'),
                ])
            </div>

            {{-- Boutons de soumission --}}
            <div class="flex justify-between mt-4">
                @include('components.forms.buttons', [
                    'type' => 'reset',
                    'name' => 'Réinitialiser',
                    'class' => 'py-2 px-3 bg-red-500 text-white rounded-md',
                ])
                @include('components.forms.buttons', [
                    'type' => 'submit',
                    'name' => 'Soumettre',
                    'class' => 'py-2 px-3 bg-blue-700 text-white rounded-md',
                ])
            </div>
        </form>
    </div>

    <script>
        // Fonction pour basculer entre les champs
        function toggleContent() {
            const check = document.getElementById('check');
            const contentField = document.getElementById('contentField');
            const fileField = document.getElementById('fileField');

            if (check.checked) {
                contentField.style.display = 'block';
                fileField.style.display = 'none';
            } else {
                contentField.style.display = 'none';
                fileField.style.display = 'block';
            }
        }
    </script>
@endsection
