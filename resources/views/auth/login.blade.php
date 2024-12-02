@extends('layouts.app')

@section('title', 'Login')

@section('content')
    <div class="mx-auto max-w-screen-xl mt-4">
        <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto mt-40 lg:py-0">
            <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
                <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                    <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                        Login
                    </h1>
                    <form class="space-y-4 md:space-y-6" action="{{ route('login-auth') }}" method="POST">
                        @csrf

                        <div>
                            @error('email')
                            <div class="mb-3 text-red-500 text-xs">{{ $message }}</div>
                        @enderror
                            <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                                email</label>
                            <input type="email" name="email" id="email"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                placeholder="name@company.com" value="{{ old('email') }}" required="">
                        </div>
                        <div>
                            <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                            <input type="password" name="password" id="password" placeholder="••••••••"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5"
                                required="">
                        </div>
                        <button type="submit"
                            class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Login
                        </button>
                        <p class="text-sm font-light text-gray-500">
                            You don't have an account? <a href="{{ route('register') }}"
                                class="font-medium text-green-600 hover:underline">Register
                                here</a>
                        </p>
                    </form>
                </div>
            </div>
        </div>
    </div>

@endsection
