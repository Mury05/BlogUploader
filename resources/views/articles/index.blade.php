@extends('layouts.app')

@section('title', 'Articles')

@section('header')
    <x-header/>
@endsection

@section('content')
    <div class="flex justify-between items-center max-w-screen-xl mx-auto mt-6">
        <h2 class="text-3xl font-bold ">Articles</h2>
        {{-- @can('see-admin-menu')
            <a href="/articles/create">
                <button class="p-3 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-700">
                    New Article
                </button>
            </a>
        @endcan --}}
         @auth
           {{-- @if (auth()->user()->can('create', 'App\\Models\Article')) --}}
                <a href="{{route('articles.create')}}">
                    <button class="p-3 bg-blue-500 text-white font-medium rounded-md hover:bg-blue-700">
                        New Article
                    </button>
                </a>
            {{-- @endif--}}
        @endauth
    </div>

    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="grid gap-8 lg:grid-cols-3">
            @each('partials.article', $articles, 'article', 'partials.no-articles')
        </div>
    </div>
@endsection
