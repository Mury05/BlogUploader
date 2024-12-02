@extends('layouts.app')

@section('title', 'Register')

@section('content')
<div class="mx-auto max-w-screen-xl mt-4">
    <div class="flex flex-col items-center justify-center px-6 py-8 mx-auto mt-40 lg:py-0">
        <div class="w-full bg-white rounded-lg shadow md:mt-0 sm:max-w-md xl:p-0">
            <div class="p-6 space-y-4 md:space-y-6 sm:p-8">
                <h1 class="text-xl font-bold leading-tight tracking-tight text-gray-900 md:text-2xl">
                    Register
                </h1>
                <form class="space-y-4 md:space-y-6" action="{{route('register-create')}}" method="POST">
                    @csrf
                    <div>
                        <label for="name" class="block mb-2 text-sm font-medium text-gray-900">Your name</label>
                        <input type="name" name="name" id="name"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" value="{{old('name')}}" placeholder="John Doe">
                    </div>
                    <div>
                        <label for="email" class="block mb-2 text-sm font-medium text-gray-900">Your
                            email</label>
                        <input type="email" name="email" id="email"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5" value="{{old('email')}}" placeholder="name@company.com">
                    </div>
                    <div>
                        <label for="password" class="block mb-2 text-sm font-medium text-gray-900">Password</label>
                        <input type="password" name="password" id="password" placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5">
                    </div>
                    <div>
                        <label for="confirm-password" class="block mb-2 text-sm font-medium text-gray-900">Confirm
                            password</label>
                        <input type="password" name="confirm-password" id="confirm-password"
                            placeholder="••••••••"
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-green-600 focus:border-green-600 block w-full p-2.5">
                    </div>
                    <button type="submit"
                        class="w-full text-white bg-green-600 hover:bg-green-700 focus:ring-4 focus:outline-none focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Create
                        an account
                    </button>
                    <p class="text-sm font-light text-gray-500">
                        Already have an account? <a href="{{route('login')}}"
                            class="font-medium text-green-600 hover:underline">Login
                            here</a>
                    </p>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
