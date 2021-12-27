<?php

namespace App\Http\Controllers;

use App\Models\Transaction;
use Illuminate\Http\Request;


class TransactionController extends Controller
{
    public function index()
    {
        if(Auth()->user()->role == 'Admin'){
            $adminTRs = Transaction::with('user')->get();
            $adminTRs->transform(function($adminTR, $key){
                $adminTR->cart_object = unserialize($adminTR->cart_object);
                return $adminTR;
            });


            return view('transaction', [
                'transactions' => $adminTRs
            ]);
        }else{
            $memberTRs = Transaction::with('user')->where('userID', 'like', Auth()->user()->id)->get();
            $memberTRs->transform(function($memberTR, $key){
                $memberTR->cart_object = unserialize($memberTR->cart_object);

                return $memberTR;
            });




            return view('transaction', [
                'transactions' => $memberTRs
            ]);
        }
    }

    public function store(Request $request)
    {
        $oldcart = Session()->get('cart');


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

}
