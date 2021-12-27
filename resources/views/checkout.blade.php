@extends('layout.layout')
@section('content')

<h1 class="text-center">Cart</h1>

<div class="container">
    @php
        $total = 0
    @endphp
    @if (session('cart'))
        @foreach (session('cart') as $id => $cart)
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

                {{-- <div class="col d-flex justify-content-center">
                    <div class=" card-update m-3 d-flex justify-content-center">
                        <a href="/add-to-cart/{{ $cart['itemID'] }}" class="btn-cart btn-xl btn-dark" role="button" aria-pressed="true"> + </a>
                    </div>

                    <div class=" card-update m-3 d-flex justify-content-center">
                        <a href="/remove-from-cart/{{ $cart['itemID'] }}" class="btn-cart btn-xl btn-dark" role="button" aria-pressed="true"> - </a>
                    </div>
                </div> --}}
            </div>
        @endforeach
    @endif
</div>

<div class="text-center mt-3">
    <h4>Total : Rp.{{$total}}</h4>
</div>


    <main class="form-signin">
        <form action="/checkout" method="POST">
            @csrf
            <fieldset class="form-floating">
                <div class="row align-items-center">
                  <legend class="col-form-label text-center">Payment Method</legend>
                    <div class="col d-flex justify-content-center">
                        <div class="form-check">
                        <input class="form-check-input @error('method') is-invalid @enderror" type="radio" name="method" id="method" value="Credit">
                        <label class="form-check-label" for="method">
                            Credit
                        </label>
                        </div>
                        <div class="form-check">
                        <input class="form-check-input @error('method') is-invalid @enderror" type="radio" name="method" id="method" value="Debit">
                        <label class="form-check-label" for="method">
                            Debit
                        </label>
                        </div>
                        @error('method')
                        <div class="text-danger">{{ $message }} </div>
                        @enderror
                    </div>
                </div>
            </fieldset>

            <div class="form-floating">
                <input type="number" class="form-control  @error('card_number') is-invalid @enderror" id="card_number" placeholder="Enter your Card Number" name="card_number">
                <label for="card_number">Card Number</label>
                @error('card_number')
                    <div class="text-danger">{{ $message }} </div>
                @enderror
            </div>

            <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Checkout</button>
        </form>
    </main>


    
    
@endsection