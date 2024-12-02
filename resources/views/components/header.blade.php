<header class="grid grid-cols-2 items-center gap-2 py-10 lg:grid-cols-2">
    <div class="flex lg:justify-start lg:col-start-1">
        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
            class="h-12 w-auto text-green-800 lg:h-16 lg:text-green-800">
            <path stroke-linecap="round" stroke-linejoin="round"
                d="M11.35 3.836c-.065.21-.1.433-.1.664 0 .414.336.75.75.75h4.5a.75.75 0 0 0 .75-.75 2.25 2.25 0 0 0-.1-.664m-5.8 0A2.251 2.251 0 0 1 13.5 2.25H15c1.012 0 1.867.668 2.15 1.586m-5.8 0c-.376.023-.75.05-1.124.08C9.095 4.01 8.25 4.973 8.25 6.108V8.25m8.9-4.414c.376.023.75.05 1.124.08 1.131.094 1.976 1.057 1.976 2.192V16.5A2.25 2.25 0 0 1 18 18.75h-2.25m-7.5-10.5H4.875c-.621 0-1.125.504-1.125 1.125v11.25c0 .621.504 1.125 1.125 1.125h9.75c.621 0 1.125-.504 1.125-1.125V18.75m-7.5-10.5h6.375c.621 0 1.125.504 1.125 1.125v9.375m-8.25-3 1.5 1.5 3-3.75" />
        </svg>
    </div>
    @if (Route::has('login'))
        <nav class="-mx-3 flex flex-1 justify-end">
            @auth
                <a href="{{route('articles') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                    <button class="p-3 bg-green-100 border border-green-600 font-medium rounded-md hover:bg-green-200">

                        Articles
                    </button>
                </a>
                <form action="{{route('logout')}}" method="POST"
                    class="rounded-md px-2 py-2 text-red-500 ring-1 ring-transparent transition hover:text-red/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                    @csrf
                    <button type="submit" class="p-3 bg-red-100 border border-red-600 font-medium rounded-md hover:bg-red-200">
                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                            stroke="currentColor" class="size-6">
                            <path stroke-linecap="round" stroke-linejoin="round"
                                d="M8.25 9V5.25A2.25 2.25 0 0 1 10.5 3h6a2.25 2.25 0 0 1 2.25 2.25v13.5A2.25 2.25 0 0 1 16.5 21h-6a2.25 2.25 0 0 1-2.25-2.25V15M12 9l3 3m0 0-3 3m3-3H2.25" />
                        </svg>
                    </button>
                </form>
            @else
                <a href="{{ route('login') }}"
                    class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                    <button class="p-3 bg-green-100 border border-green-600 font-medium rounded-md hover:bg-green-200">
                        Log in
                    </button>
                </a>

                @if (Route::has('register'))
                    <a href="{{ route('register') }}"
                        class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]">
                        <button class="p-3 bg-blue-100 border border-blue-600 font-medium rounded-md hover:bg-blue-200">
                            Register
                        </button>
                    </a>
                @endif
            @endauth
        </nav>
    @endif
</header>
