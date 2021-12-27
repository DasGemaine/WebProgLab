@extends('layout.layout')
@section('content')

<div class="text-center">
    <h1>Transaction History</h1>
</div>

@foreach ( $transactions as $transaction )
    <div class="container mt-3 border border-4 border-dark">
        <div class="container mt-2">
            <div class="col">
                <div class="container mt-2">
                    <div class="row">
                        <h3>Transaction id : {{ $transaction->id }} </h3>
                        <div class="col d-flex justify-content-start">
                            <h3>Transaction Date :</h3>
                        </div>
                        <div class="col">
                            <h3>{{ $transaction->created_at->toDateString() }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            <h3>Method :</h3>
                        </div>
                        <div class="col">
                            <h3>{{ $transaction->method }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            <h3>Card Number :</h3>
                        </div>
                        <div class="col">
                            <h3>xxxx-xxxx-xxxx-{{ substr($transaction->card_number, -4) }}</h3>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col d-flex justify-content-start">
                            <h3>User's Name :</h3>
                        </div>
                        <div class="col">
                            <h3>{{ $transaction->user->name }}</h3>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="container d-flex justify-content-center mt-4">
            
            <table class="table table-bordered table-sm border border-5 border-dark">
            <thead>
                <tr>
                <th class="text-center" scope="col">Furniture's Name</th>
                <th class="text-center" scope="col" >Furniture's Price</th>
                <th class="text-center" scope="col">Quantity</th>
                <th class="text-center" scope="col">Total Price for Each Furniture</th>
        
                </tr>
            </thead>
            <tbody>
                @php
                    $total = 0
                @endphp
                @foreach ( $transaction->cart_object as $cart)
                    @php
                        $total = $total + ($cart['qty']*($cart['price']))
                    
                    @endphp
                    <tr>
                        {{-- {{dd($cart)}} --}}
                    <td class="text-center">{{ $cart['name'] }}</td>
                    <td class="text-center">Rp.{{ $cart['price'] }}</td>
                    <td class="text-center">{{ $cart['qty'] }}</td>
                    <td class="text-center">Rp.{{ ($cart['qty'])*($cart['price']) }}</td>
                    </tr>
                @endforeach
                <div class="tr">
                    <td colspan="3" class="text-center">Total Price</td>
                    <td class="text-center">Rp.{{ $total }}</td>
                    </div>
            </tbody>
            </table>
        </div>
    </div>
@endforeach

@endsection