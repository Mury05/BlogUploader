 {{-- <p>Content: {{ $article->body }}</p>  --}}
 <article class="p-6 bg-white rounded-lg border border-gray-200 shadow-md">
     <div class="flex justify-between items-center mb-5 text-gray-500">
         <span class="bg-green-100 text-green-800 text-xs font-medium inline-flex items-center px-2.5 py-0.5 rounded ">
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
     <h2 class="mb-2 text-2xl font-bold tracking-tight text-gray-900 "><a href="#">{{ $article['title'] }}</a>
     </h2>
     <p class="mb-5 font-light text-gray-500 ">{{ $article->user->name }}</p>
     <div class="flex justify-between items-center">
         <a href="{{route('articles.show', ['id' => $article->id])}}"
             class="inline-flex items-center font-medium text-green-600 hover:underline">
             Read more
             <svg class="ml-2 w-4 h-4" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                 <path fill-rule="evenodd"
                     d="M10.293 3.293a1 1 0 011.414 0l6 6a1 1 0 010 1.414l-6 6a1 1 0 01-1.414-1.414L14.586 11H3a1 1 0 110-2h11.586l-4.293-4.293a1 1 0 010-1.414z"
                     clip-rule="evenodd"></path>
             </svg>
         </a>
         @if ($article->file_path)
             <a href="{{route('articles.show', ['id' => $article->id])}}"
                 class="inline-flex items-center font-medium text-green-600 hover:underline">
                 <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor" class="size-6">
                     <path fill-rule="evenodd"
                         d="M12 2.25a.75.75 0 0 1 .75.75v11.69l3.22-3.22a.75.75 0 1 1 1.06 1.06l-4.5 4.5a.75.75 0 0 1-1.06 0l-4.5-4.5a.75.75 0 1 1 1.06-1.06l3.22 3.22V3a.75.75 0 0 1 .75-.75Zm-9 13.5a.75.75 0 0 1 .75.75v2.25a1.5 1.5 0 0 0 1.5 1.5h13.5a1.5 1.5 0 0 0 1.5-1.5V16.5a.75.75 0 0 1 1.5 0v2.25a3 3 0 0 1-3 3H5.25a3 3 0 0 1-3-3V16.5a.75.75 0 0 1 .75-.75Z"
                         clip-rule="evenodd" />
                 </svg>
             </a>
         @endif
     </div>
 </article>
