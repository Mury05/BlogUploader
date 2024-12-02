@extends('layouts.app')

@section('title', 'Edit-Article')

@section('header')
    <x-header />
@endsection
@section('content')
    <div class="mx-auto w-2/3 flex flex-col">
        <h1 class="my-4 text-xl text-center">Éditer l'article {{ $article->title }}</h1>

        <form action="{{ route('articles.update',['article' => $article]) }}" method="post" enctype="multipart/form-data"
            class="border border-gray-950 p-5 rounded-md shadow-blue-500/40 ">
            @csrf
            @method('put')

            @include('components.forms.input', [
                'type' => 'text',
                'name' => 'title',
                'label' => "Titre de l'article",
                'value' => $article->title,
                'class' => 'border border-green-700 p-2 rounded-md',
            ])
            @include('components.forms.input', [
                'type' => 'textarea',
                'name' => 'content',
                'label' => "Description de l'article",
                'value' => $article->content,
                'class' => 'border border-green-700 p-2 rounded-md',
            ])
            <div class="flex justify-between">

                @include('components.forms.input', [
                    'type' => 'file',
                    'name' => 'image',
                    'label' => 'Image de couverture',
                    'value' => old('image'),
                ])

                @include('components.forms.input', [
                    'type' => 'file',
                    'name' => 'filepdf',
                    'label' => 'Fichier PDF de l\'article',
                    'value' => old('filepdf'),
                ])
            </div>


            <div class="flex justify-between">

                @include('components.forms.buttons', [
                    'type' => 'reset',
                    'name' => 'Réinitialiser',
                    'class' => 'mt-5 py-2 px-3 bg-red-500 text-white rounded-md',
                ])
                @include('components.forms.buttons', [
                    'type' => 'submit',
                    'name' => 'Modifier',
                    'class' => 'mt-5 py-2 px-3 bg-blue-700 text-white rounded-md',
                ])
            </div>
        </form>
    </div>
@endsection
