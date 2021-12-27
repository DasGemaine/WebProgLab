@extends('layout.layout')
@section('content')

@if (session()->has('success_remove-from-cart'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
        {{ session('success_remove-from-cart') }}
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
@endif


@if (session()->has('cart'))
    <h1 class="text-center">Cart</h1>

    <div class="container">
        @php
            $total = 0
        @endphp
        @if (session('cart'))
            @foreach (session('cart') as $cart)
                @php
                    $total = $total + ($cart['qty'])*($cart['price']) 
                @endphp

                <div class="row text-center p-4 border border-4 border-dark m-2">
                    <div class="col align-self-center">
                        <div class="cart-image">
                            <img src = "{{ asset('storage/'. $cart['image']) }}", width="100px", height="95px">
                        </div>
                    </div>

                    <div class="col align-self-center">
                        <div class="cart-user">
                            {{ $cart['name'] }}
                        </div>
                    </div>

                    <div class="col align-self-center">
                        Rp.{{ $cart['price'] }}
                    </div>

                    <div class="col align-self-center">
                        {{ $cart['qty'] }} Item(s)
                    </div>

                    <div class="col align-self-center">
                        {{ ($cart['qty'])*($cart['price']) }}
                    </div>

                    <div class="col d-flex justify-content-center">
                        <div class=" card-update m-3 d-flex justify-content-center">
                            <a href="/add-to-cart/{{ $cart['itemID'] }}" class="btn btn-cart btn-xl btn-dark" role="button" aria-pressed="true"> + </a>
                        </div>

                        <div class=" card-update m-3 d-flex justify-content-center">
                            <a href="/remove-from-cart/{{ $cart['itemID'] }}" class="btn btn-cart btn-xl btn-dark" role="button" aria-pressed="true"> - </a>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    </div>
    <div class="text-center mt-3">
        <h4>Total : Rp.{{$total}}</h4>
    </div>
    <div class="text-center mt-3 mb-3">
            <div class=" card-update">
                <a href="/checkout" class="btn btn-checkout btn-xl btn-warning" role="button" aria-pressed="true"> Proceed to Checkout </a>
            </div>
    </div>
@else
    <h1 class="text-center">Sorry, you dont have anything in your cart:(</h1>
@endif
    
@endsection