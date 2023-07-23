@extends('layouts.app')

@section('content')
    <div>
        <div class="mb-3 flex items-center justify-between">
            <h2 class="text-xl font-semibold">Deposited Transactions</h2>
            <a class="inline-flex items-center rounded-md bg-green-500 px-4 py-2 text-sm font-semibold leading-6 text-white shadow transition duration-150 ease-in-out hover:bg-green-400"
                href="{{ route('deposited_transactions.create') }}">Add Deposite</a>
        </div>
        <div>
            <table class="w-full">
                <thead>
                    <tr class="border-b text-left">
                        <th class="p-2">ID</th>
                        <th class="p-2">Amount</th>
                        <th class="p-2">User</th>
                        <th class="p-2">Date</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($deposited_transactions as $transaction)
                        <tr class="border-b text-left">
                            <td class="p-2">{{ $transaction->id }}</td>
                            <td class="p-2">{{ $transaction->amount }}</td>
                            <td class="p-2">{{ $transaction->user->name }}</td>
                            <td class="p-2">{{ $transaction->date->diffForHumans() }}</td>
                        </tr>
                    @empty
                        <tr class="border-b text-left">
                            <td class="p-2 text-center" colspan="100%">No Data Foun!</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>
@endsection
