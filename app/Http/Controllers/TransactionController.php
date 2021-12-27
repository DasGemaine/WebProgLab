<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\User;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreTransactionRequest;
use App\Http\Requests\UpdateTransactionRequest;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(Auth()->user()->role == 'Admin'){
            $adminTRs = Transaction::with('user')->get();
            $adminTRs->transform(function($adminTR, $key){
                $adminTR->cart_object = unserialize($adminTR->cart_object);
                return $adminTR;
            });

            // dd($adminTRs);


            return view('transaction', [
                'transactions' => $adminTRs
            ]);
        }else{
            $memberTRs = Transaction::with('user')->where('userID', 'like', Auth()->user()->id)->get();
            $memberTRs->transform(function($memberTR, $key){
                $memberTR->cart_object = unserialize($memberTR->cart_object);
                // dd($memberTR->cart_object);
                return $memberTR;
            });

            // dd($memberTRs);


            return view('transaction', [
                'transactions' => $memberTRs
            ]);
        }
    }

    public function store(Request $request)
    {
        $oldcart = Session()->get('cart');
        $cart = new Cart($oldcart);


        $transaction = $request->validate([
            'method' => 'required|in:Credit,Debit',
            'card_number' => 'required|digits:16'
        ]);

        $transaction['cart_object'] = serialize($oldcart);
        $transaction['userID'] = Auth()->user()->id;

        Transaction::create($transaction);

        session()->forget('cart');

        $request->session()->flash('success_checkout', 'Transaction successfull!');

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function show(Transaction $transaction)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function edit(Transaction $transaction)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTransactionRequest  $request
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTransactionRequest $request, Transaction $transaction)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Transaction  $transaction
     * @return \Illuminate\Http\Response
     */
    public function destroy(Transaction $transaction)
    {
        //
    }
}
