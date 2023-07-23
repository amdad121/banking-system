@extends('layouts.guest')

@section('content')
    <h3 class="mb-4 border-b pb-2 text-center text-xl font-semibold">Login</h3>
    <form class="flex flex-col gap-4" action="{{ route('login') }}" method="POST">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="email">Email</label>
            <input
                class="rounded-md border-gray-300 px-2 py-1 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                id="email" name="email" type="email" />
            @if ($errors->has('email'))
                <div class="text-red-500">
                    {{ $errors->first('email') }}
                </div>
            @endif
        </div>
        <div class="flex flex-col gap-2">
            <label for="password">Password</label>
            <input
                class="rounded-md border-gray-300 px-2 py-1 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                id="password" name="password" type="password" />
            @if ($errors->has('password'))
                <div class="text-red-500">
                    {{ $errors->first('password') }}
                </div>
            @endif
        </div>
        <div class="flex items-center justify-between">
            <div>
                <label class="inline-flex items-center">
                    <input
                        class="rounded border-gray-300 text-indigo-600 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50 focus:ring-offset-0"
                        name="remember" type="checkbox" />
                    <span class="ml-2">Remember Me</span>
                </label>
            </div>
            <div>
                <button
                    class="inline-flex items-center rounded-md bg-green-500 px-4 py-2 text-sm font-semibold leading-6 text-white shadow transition duration-150 ease-in-out hover:bg-green-400"
                    type="submit">
                    Login
                </button>
            </div>
        </div>
    </form>
    <div class="mt-4 flex items-center justify-center gap-2">
        <a href="{{ route('register') }}">Register</a> a new user
    </div>
@endsection
