@extends('layouts.app')

@section('title', 'Articles')

@section('header')
    <x-header />
@endsection

@section('content')
    <div class="py-8 px-4 mx-auto max-w-screen-xl lg:py-16 lg:px-6">
        <div class="grid gap-8">
            <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md">
                <div class="flex justify-between items-center mb-3 text-gray-500">
                    <span
                        class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
                        <svg class="mr-1 w-3 h-3" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                            <path fill-rule="evenodd"
                                d="M2 5a2 2 0 012-2h8a2 2 0 012 2v10a2 2 0 002 2H4a2 2 0 01-2-2V5zm3 1h6v4H5V6zm6 6H5v2h6v-2z"
                                clip-rule="evenodd"></path>
                            <path d="M15 7h1a2 2 0 012 2v5.5a1.5 1.5 0 01-3 0V7z"></path>
                        </svg>
                        Article
                    </span>
                    <span class="text-sm">{{ $article->created_at->diffForHumans() }}</span>
                </div>
                <div class="flex justify-between items-center">

                    <div>
                        <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><a
                                href="#">{{ $article['title'] }}</a></h2>
                        <p class="my-5 font-light text-gray-900">{{ $article->content }}</p>

                        <p class="mb-5 font-light text-gray-500 ">{{ $article->user->name }}</p>
                        @if ($article->file_path)
                            <a href="{{ asset('storage/' . $article->file_path) }}"
                                download="{{ 'article_' . $article->title . '.pdf' }}"
                                class="inline-flex items-center font-medium text-green-600 hover:underline">
                                Télécharger l'article
                                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor"
                                    class="size-6">
                                    <path fill-rule="evenodd"
                                        d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                                        clip-rule="evenodd" />
                                </svg>
                            </a>
                        @endif
                    </div>
                    <div>
                        @if ($article->image)

                        <img class="h-60 w-60" src="{{ asset('storage/' . $article->image) }}" alt="image">
                        @endif
                        
                    </div>
                </div>

                <div class="flex justify-between items-center mb-8">

                    <div class=" text-blue-700 mt-3 hover:underline">
                        <a href="/article/{{ $article->id }}/edit">Éditer l'article</a>
                    </div>
                    <form action="/article/{{ $article->id }}/delete" method="POST">
                        @csrf
                        @method('DELETE')
                        <input type="submit" value="Effacer l'article"
                            class=" text-red-500 mt-3 cursor-pointer hover:underline">
                    </form>
                </div>
                @if ($article->file_path)
                    <iframe src="{{ asset('storage/' . $article->file_path) }}" width="100%" height="600px"></iframe>
                @endif
            </article>
        </div>
    </div>
@endsection
