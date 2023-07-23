<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class WithdrawalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $withdrawal_transactions = Transaction::whereTransactionType('Withdrawal')->paginate(10);

        return view('withdrawal.index', compact('withdrawal_transactions'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('withdrawal.create');

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $user = $request->user();

        $query = Transaction::whereUserId($user->id)->whereTransactionType('Withdrawal');

        $amount_limit = $query->sum('amount') > $request->amount ? $query->sum('amount') : $request->amount;

        $monthly_amount_limit = $query->whereMonth('date', Carbon::now()->month)->sum('amount') > $request->amount ? $query->whereMonth('date', Carbon::now()->month)->sum('amount') : $request->amount;

        $percentage = ($user->account_type == 'Individual') || (($user->account_type == 'Business') && ($amount_limit > 50000)) ? 0.015 : 0.025;

        $fee = ((now()->format('l') == 'Friday') || ($amount_limit < 1000) || ($monthly_amount_limit < 5000)) ? null : (($percentage / 100) * $request->amount);

        $amount = $fee + $request->amount;

        if ($user->balance < $amount) {
            throw ValidationException::withMessages([
                'amount' => 'Amount must be less then account balance',
            ]);
        }

        Transaction::create([
            'transaction_type' => 'Withdrawal',
            'user_id' => $user->id,
            'amount' => $request->amount,
            'fee' => $fee,
            'date' => now(),
        ]);

        $user->balance = $user->balance - $amount;
        $user->save();

        session()->flash('success', 'Withdrawal Added.');

        return to_route('withdrawal_transactions.index');
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
    public function update(Request $request, Transaction $transaction)
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
