@extends('layout.layout')
@section('content')
@auth
    @if (Auth::user()->role == 'Admin') 
            @if (session()->has('furniture/success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    {{ session('furniture/success') }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            <h1 class = "header text-center text-secondary">
                Welcome, {{ Auth::user()->name }} to JH Furniture 
            </h1>

            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                        <form action="/view">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" placeholder="Search..."name = "search">
                                <div class="input-group-append">
                                <button class="btn btn-dark ms-3" type="submit">Search</button>
                                </div>
                            </div>                          
                        </form>
                    </div>
                </div>
                <div class="card-group">
                    @foreach ($items as $item) 
                        <div class="card m-5 border border-4 border-secondary">
                            <div class="row">
                                <div class="card-detail  text-center mt-3">
                                    <a class="card-image" href="/detail/{{$item->name}}">
                                        <img src="{{ asset('storage/'. $item->image) }}", width="100px", height="95px">
                                    </a>

                                    <div class="card-name text-center mt-5">
                                        <p>{{ $item->name }}</p>
                                    </div>

                                    <div class="card-price text-center mt-3">
                                        <p>Rp.{{ $item->price }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-secondary">
                                <div class="card-button m-3">
                                    <div class=" card-update">
                                        <a href="/updateFurniture/{{$item->name}}" class="btn btn-warning" role="button" aria-pressed="true">Update</a>
                                    </div>
                                    <div class=" card-update">
                                        <a href="/deleteFurniture/{{$item->name}}" class="btn btn-danger" role="button" aria-pressed="true">Delete</a>       
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>  
                <div class="d-flex justify-content-end">
                    {{ $items->links() }}
                </div>
            </div>
    @else
            <h1 class = "header text-center text-secondary">
                Welcome, {{ Auth::user()->name }} to JH Furniture 
            </h1>
            
            <div class="container">
                <div class="row justify-content-center mt-5">
                    <div class="col-md-4">
                        <form action="/view">
                            <div class="input-group mb-2">
                                <input type="text" class="form-control" placeholder="Search..."name = "search">
                                <div class="input-group-append">
                                <button class="btn btn-dark ms-3" type="submit">Search</button>
                                </div>
                            </div>                          
                        </form>
                    </div>
                </div>

                <div class="card-group">
                    @foreach ($items as $item)
                        <div class="card m-5 border border-4 border-secondary">
                            <div class="row">
                                <div class="card-detail text-center mt-3">
                                    <a class="card-image" href="/detail/{{$item->name}}">
                                        <img src="{{ asset('storage/'. $item->image) }}", width="100px", height="95px">
                                    </a>

                                    <div class="card-name text-center mt-5">
                                        <p>{{ $item->name }}</p>
                                    </div>

                                    <div class="card-price text-center mt-3">
                                        <p>Rp.{{ $item->price }}</p>
                                    </div>
                                </div>
                            </div>
                            <div class="bg-secondary">
                                <div class="card-button m-3 d-flex justify-content-center">
                                    <div class=" card-update">
                                        <button type="submit" class="btn btn-warning">Add to Cart</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="d-flex justify-content-end">
                    {{ $items->links() }}
                </div> 
            </div>
    @endif
@else
    <h1 class = "header text-center text-secondary">
        Welcome to JH Furniture 
    </h1>


    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-4">
                <form action="/view">
                    <div class="input-group mb-2">
                        <input type="text" class="form-control" placeholder="Search..."name = "search">
                        <div class="input-group-append">
                        <button class="btn btn-dark ms-3" type="submit">Search</button>
                        </div>
                    </div>                          
                </form>
            </div>
        </div>

        <div class="card-group">
            @foreach ($items as $item)
                <div class="card m-5 border border-4 border-secondary">
                    <div class="row">
                        <div class="card-detail text-center mt-3">
                            <a class="card-image" href="/detail/{{$item->name}}">
                                <img src="{{ asset('storage/'. $item->image) }}", width="100px", height="95px">
                            </a>

                            <div class="card-name text-center mt-5">
                                <p>{{ $item->name }}</p>
                            </div>

                            <div class="card-price text-center mt-3">
                                <p>Rp.{{ $item->price }}</p>
                            </div>
                        </div>
                    </div>
                    <div class="bg-secondary">
                        <div class="card-button m-3 d-flex justify-content-center">
                            <div class=" card-update">
                                <button type="submit" class="btn btn-warning">Add to Cart</button>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <div class="d-flex justify-content-end">
            {{ $items->links() }}
        </div>
    </div>
@endauth
    
@endsection
