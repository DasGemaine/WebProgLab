@extends('layout.layout')
@section('content')
@auth
    @if (Auth::user()->role == 'Admin')
        <h1 class = "header text-center text-secondary text-uppercase">
            {{$items->name}}
        </h1>

        <div class="container">
            <div class="row">
                <div class="col">
                    <div class="card-image offset-md-4 mt-4">
                        <img src="{{ asset('storage/'. $items->image) }}", width="300px", height="285px">
                    </div>
                </div>
                <div class="col align-self-center">
                    <div class="row mb-3">
                        <div class="col">
                            <div class="field-name">
                                Name : 
                            </div>
                        </div>
                        <div class="col">
                            <div class="detail-value">
                                {{$items->name}} 
                            </div>
                        </div>
                    </div>
                    <div class="row mb-3">
                        <div class="col">
                            <div class="field-name">
                                Price : 
                            </div>
                        </div>
                        <div class="col">
                            <div class="detail-value">
                                {{$items->price}}
                            </div>
                        </div>
                    </div>  

                    <div class="row mb-3">
                        <div class="col">
                            <div class="field-name">
                                Color : 
                            </div>
                        </div>
                        <div class="col">
                            <div class="detail-value">
                                {{$items->color}}
                            </div>
                        </div>
                    </div>

                    <div class="row mb-3">
                        <div class="col">
                            <div class="field-name">
                                Type : 
                            </div>
                        </div>
                        <div class="col">
                            <div class="detail-value">
                                {{$items->furniture_type}}
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div class="row mt-5">
                <div class="col">
                    <div class=" item-update text-end">
                        <a href="{{url()->previous()}}" class="btn btn-profile btn-lg btn-secondary" role="button" aria-pressed="true">Previous</a>
                    </div>
                </div>
                <div class="col">
                    <div class=" item-update text-center">
                        <a href="/updateFurniture/{{$items->name}}" class="btn btn-profile btn-lg btn-warning" role="button" aria-pressed="true">Update</a>
                    </div>
                </div>
                <div class="col">
                    <div class=" item-update text-start">
                        <a href="/deleteFurniture/{{$items->name}}" class="btn btn-profile btn-lg btn-danger" role="button" aria-pressed="true">Delete</a>
                    </div>
                </div>
            </div>
        </div>
    @else
    <h1 class = "header text-center text-secondary text-uppercase">
        {{$items->name}} 
    </h1>
    
    <div class="container">
        <div class="row">
            <div class="col">
                <div class="card-image offset-md-4 mt-4">
                    <img src="{{ asset('storage/'. $items->image) }}", width="300px", height="285px">
                </div>
            </div>
            <div class="col align-self-center">
                <div class="row">
                    <div class="col">
                        <div class="field-name">
                            Name : 
                        </div>
                    </div>
                    <div class="col">
                        <div class="detail-value">
                            {{$items->name}} 
                        </div>
                    </div>
                </div>
                <div class="row text-center">
                    <div class="col">
                        <div class="field-name">
                            Price : 
                        </div>
                    </div>
                    <div class="col">
                        <div class="detail-value">
                            {{$items->price}}
                        </div>
                    </div>
                </div>  
                <div class="row">
                    <div class="col">
                        <div class="field-name">
                            Color : 
                        </div>
                    </div>
                    <div class="col">
                        <div class="detail-value">
                            {{$items->color}}
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col">
                        <div class="field-name">
                            Type : 
                        </div>
                    </div>
                    <div class="col">
                        <div class="detail-value">
                            {{$items->furniture_type}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt-5">
            <div class="col">
                <div class=" item-update text-end">
                    <a href="{{url()->previous()}}" class="btn btn-profile btn-secondary" role="button" aria-pressed="true">Previous</a>
                </div>
            </div>
            <div class="col">
                <div class=" item-update text-start">
                    <a href="/add-to-cart/{{ $items->name }}" class="btn btn-profile btn-warning" role="button" aria-pressed="true">Add to Cart</a>
                </div>
            </div>
        </div>
    </div>
    @endif
@else
    
@endauth

@guest
<h1 class = "header text-center text-secondary text-uppercase">
    {{ $items->name}}
    
</h1>

<div class="container">
    <div class="row">
        <div class="col">
            <div class="card-image offset-md-4 mt-4">
                <img src="{{ asset('storage/'. $items->image) }}", width="300px", height="285px">
            </div>
        </div>
        <div class="col align-self-center">
            <div class="row">
                <div class="col">
                    <div class="field-name">
                        Name : 
                    </div>
                </div>
                <div class="col">
                    <div class="detail-value">
                        {{$items->name}} 
                    </div>
                </div>
            </div>
            <div class="row text-center">
                <div class="col">
                    <div class="field-name">
                        Price : 
                    </div>
                </div>
                <div class="col">
                    <div class="detail-value">
                        {{$items->price}}
                    </div>
                </div>
            </div>  
            <div class="row">
                <div class="col">
                    <div class="field-name">
                        Color : 
                    </div>
                </div>
                <div class="col">
                    <div class="detail-value">
                        {{$items->color}}
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col">
                    <div class="field-name">
                        Type : 
                    </div>
                </div>
                <div class="col">
                    <div class="detail-value">
                        {{$items->furniture_type}}
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-5">
        <div class="col">
            <div class=" item-update text-end">
                <a href="{{url()->previous()}}" class="btn btn-profile btn-secondary" role="button" aria-pressed="true">Previous</a>
            </div>
        </div>
        <div class="col">
            <div class=" item-update text-start">
                <a href="/login" class="btn btn-profile btn-warning" role="button" aria-pressed="true">Add to Cart</a>
            </div>
        </div>
    </div>
</div>
    
@endguest
    
@endsection
