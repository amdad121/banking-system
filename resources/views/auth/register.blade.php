@extends('layouts.guest')

@section('content')
    <h3 class="mb-4 border-b pb-2 text-center text-xl font-semibold">Register</h3>
    <form class="flex flex-col gap-4" action="{{ route('register') }}" method="POST">
        @csrf
        <div class="flex flex-col gap-2">
            <label for="name">Name</label>
            <input
                class="rounded-md border-gray-300 px-2 py-1 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                id="name" name="name" type="text" />
            @if ($errors->has('name'))
                <div class="text-red-500">
                    {{ $errors->first('name') }}
                </div>
            @endif
        </div>
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
        <div class="flex flex-col gap-2">
            <label for="password_confirmation">Password</label>
            <input
                class="rounded-md border-gray-300 px-2 py-1 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                id="password_confirmation" name="password_confirmation" type="password" />
            @if ($errors->has('password_confirmation'))
                <div class="text-red-500">
                    {{ $errors->first('password_confirmation') }}
                </div>
            @endif
        </div>
        <div class="flex flex-col gap-2">
            <label for="account_type">Account Type</label>
            <select
                class="rounded-md border-gray-300 px-2 py-1 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                id="account_type" name="account_type">
                <option value="">Please Select</option>
                <option value="Individual">Individual</option>
                <option value="Business">Business</option>
            </select>
            @if ($errors->has('account_type'))
                <div class="text-red-500">
                    {{ $errors->first('account_type') }}
                </div>
            @endif
        </div>
        <div class="flex items-center justify-end">
            <div>
                <button
                    class="inline-flex items-center rounded-md bg-green-500 px-4 py-2 text-sm font-semibold leading-6 text-white shadow transition duration-150 ease-in-out hover:bg-green-400"
                    type="submit">
                    Register
                </button>
            </div>
        </div>
    </form>
    <div class="mt-4 flex items-center justify-center gap-2">
        Back to <a href="{{ route('login') }}">Login</a>
    </div>
@endsection
