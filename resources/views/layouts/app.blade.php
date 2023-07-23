<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link href="https://fonts.bunny.net" rel="preconnect">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <header class="bg-gray-300 shadow">
        <div class="container mx-auto py-2">
            <nav class="flex items-center justify-between">
                <div>
                    <h2 class="text-xl font-semibold">
                        <a href="{{ route('transactions.index') }}">Dashboard</a>
                    </h2>
                </div>
                <div class="space-x-1">
                    @guest

                        <a class="px-2 py-2 hover:shadow-inner" href="{{ route('login') }}">Login</a>
                        <a class="px-2 py-2 hover:shadow-inner" href="{{ route('register') }}">Register</a>
                    @else
                        <span class="mr-4 text-gray-800">Balance : {{ auth()->user()->balance }}</span>

                        <a class="px-2 py-2 hover:shadow-inner" href="{{ route('transactions.index') }}">All
                            Transactions</a>
                        <a class="px-2 py-2 hover:shadow-inner" href="{{ route('deposited_transactions.index') }}">Deposited
                            Transactions</a>
                        <a class="px-2 py-2 hover:shadow-inner"
                            href="{{ route('withdrawal_transactions.index') }}">Withdrawal Transactions</a>

                        <form class="inline" method="POST" action="{{ route('logout') }}">
                            @csrf

                            <a class="px-2 py-2 hover:shadow-inner" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();">
                                {{ __('Log Out') }}
                            </a>
                        </form>
                    @endguest
                </div>
            </nav>
        </div>
    </header>
    <main>
        <div class="container mx-auto my-5">
            @yield('content')
        </div>
    </main>
</body>

</html>
