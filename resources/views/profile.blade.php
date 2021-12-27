@extends('layout.layout')
@section('content')
@auth
    @if (Auth::user()->role == 'Admin')
        <div class="d-flex justify-content-center mt-3">
            <h1 style="color:rgb(35, 37, 35)">{{Auth::user()->name}}'s Profile</h1>
        </div>
        <div class="container ">
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <h3>Full Name</h3>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="text-wrap">
                                <p>{{Auth::user()->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <h3>Email</h3>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="text-wrap">
                                <p>{{Auth::user()->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
            
                <div class="container">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <h3>Role</h3>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="text-wrap">
                                <p>{{Auth::user()->role}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-3">
                        <div class="d-flex justify-content-around">
                            <div class=" card-update">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <div class=" card-update">
                                        <button type="submit" class="btn btn-xl btn-danger">Log out</button> 
                                    </div>
                                </form> 
                            </div>
                            <div class=" card-update">
                                <a href="/transaction" class="btn btn-success" role="button" aria-pressed="true">View All User's Transaction</a>                  
                            </div>
                            <div class=" card-update">
                                <a href="/profile/{{Auth::user()->name}}/update" class="btn btn-warning" role="button" aria-pressed="true">Update Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    @else
        <div class="d-flex justify-content-center mt-3">
            <h1 style="color : rgb(35, 37, 35)">{{Auth::user()->name}}'s Profile</h1>
        </div>
        <div class="container ">
            <div class="col">
                <div class="container">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <h3>Full Name</h3>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="text-wrap">
                                <p>{{Auth::user()->name}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <h3>Email</h3>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="text-wrap">
                                <p>{{Auth::user()->email}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col d-flex align-items-center justify-content-center">
                            <h3>Address</h3>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="text-wrap">
                                <p>{{Auth::user()->address}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <h3>Gender</h3>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="text-wrap">
                                @if (Auth::user()->gender == 'M')
                                    <p>Male</p>
                                @else
                                    <p>Female</p>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row">
                        <div class="col d-flex justify-content-center">
                            <h3>Role</h3>
                        </div>
                        <div class="col d-flex justify-content-center">
                            <div class="text-wrap">
                                <p>{{Auth::user()->role}}</p>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="container">
                    <div class="row mt-3">
                        <div class="d-flex justify-content-around">
                            <div class=" card-update">
                                <form action="/logout" method="POST">
                                    @csrf
                                    <div class=" card-update">
                                        <button type="submit" class="btn btn-xl btn-danger">Log out</button> 
                                    </div>
                                </form> 
                            </div>
                            <div class=" card-update">
                                <a href="/transaction" class="btn btn-success" role="button" aria-pressed="true">View Transaction History</a>                      
                            </div>
                            <div class=" card-update">
                                <a href="/profile/{{Auth::user()->name}}/update" class="btn btn-warning" role="button" aria-pressed="true">Update Profile</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>        
    @endif
@endauth
    
@endsection