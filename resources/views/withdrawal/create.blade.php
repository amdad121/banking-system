@extends('layouts.app')

@section('content')
    <div class="mx-auto w-7/12">
        <h3 class="mb-4 border-b pb-2 text-center text-xl font-semibold">Withdrawal</h3>
        <form class="flex flex-col gap-4" action="{{ route('withdrawal_transactions.store') }}" method="POST">
            @csrf
            <div class="flex flex-col gap-2">
                <label for="amount">Amount</label>
                <input
                    class="rounded-md border-gray-300 px-2 py-1 shadow-sm focus:border-indigo-300 focus:ring focus:ring-indigo-200 focus:ring-opacity-50"
                    id="amount" name="amount" type="number" />
                @if ($errors->has('amount'))
                    <div class="text-red-500">
                        {{ $errors->first('amount') }}
                    </div>
                @endif
            </div>
            <div class="flex items-center justify-between">
                <div>
                    <button
                        class="inline-flex items-center rounded-md bg-green-500 px-4 py-2 text-sm font-semibold leading-6 text-white shadow transition duration-150 ease-in-out hover:bg-green-400"
                        type="submit">
                        Submit
                    </button>
                </div>
            </div>
        </form>
    </div>
@endsection
