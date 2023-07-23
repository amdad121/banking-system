<?php

namespace App\Http\Controllers;

use App\Http\Requests\DepositRequest;
use App\Models\Transaction;
use App\Models\User;

class DepositedController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $deposited_transactions = Transaction::whereTransactionType('Deposited')->paginate(10);

        return view('deposited.index', compact('deposited_transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('deposited.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(DepositRequest $request)
    {
        Transaction::create([
            'transaction_type' => 'Deposited',
            'user_id' => auth()->id(),
            'amount' => $request->amount,
            'date' => now(),
        ]);

        $user = User::find(auth()->id());
        $user->balance = $user->balance + $request->amount;
        $user->save();

        session()->flash('success', 'Deposit Added.');

        return to_route('deposited_transactions.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(DepositRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
