@extends('layout.layout')
@section('content')
    <div class="container">
        @auth
            @if (session()->has('item/success_input'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('item/success_input') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('furniture/success_update'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('furniture/success_update') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif

            @if (session()->has('success_add-to-cart'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success_add-to-cart') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif  
            
            @if (session()->has('success_checkout'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                {{ session('success_checkout') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
        @endauth

        @auth
            <h1 class = "header text-center text-secondary">
                Welcome, {{ Auth::user()->name }} to JH Furniture 
            </h1>
        @else
            <h1 class = "header text-center text-secondary">
                Welcome to JH Furniture 
            </h1>
        @endauth

        <div class="card-group">
            @foreach ($items as $item)
                <div class="card m-5 border border-4 border-secondary">
                    <div class="row">
                        <div class="card-detail">
                            <div class="image-detail text-center mt-3">
                                <a class="card-image" href="/detail/{{$item->name}}">
                                    <img src="{{ asset('storage/'. $item->image) }}", width="100px", height="95px">
                                </a>
                            </div>
                
                            <div class="card-name text-center mt-5">
                                <p>{{ $item->name }}</p>
                            </div>

                            <div class="card-price text-center mt-3">
                                <p>Rp.{{ $item->price }}</p>
                            </div>
                        </div>
                    </div>
                    @auth
                        @if (Auth::user()->role == 'Admin')
                            <div class="bg-secondary">
                                <div class="card-button m-3">
                                    <div class=" card-update">
                                        <a href="/updateFurniture/{{$item->name}}" class="btn btn-warning" role="button" aria-pressed="true">Update</a>
                                    </div>
                                    <div class=" card-update">
                                        <a href="/deleteFurniture/{{$item->id}}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>                      
                                    </div>
                                </div>
                            </div>
                        @else
                            <div class="bg-secondary">
                                <div class=" card-update m-3 d-flex justify-content-center">
                                    <a href="/add-to-cart/{{ $item->id }}" class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</a>
                                </div>
                            </div>
                        @endif
                    @else
                        <div class="bg-secondary">
                            <div class="card-button m-3 d-flex justify-content-center">
                                <div class=" card-update">
                                    <a href="/login" class="btn btn-warning" role="button" aria-pressed="true">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    @endauth
                </div>
            @endforeach
        </div>
    </div>
@endsection