@extends('layout.layout')
@section('content')
  <main class="form-signin">
    @if (session()->has('success_register'))
    <div class="alert alert-success alert-dismissible fade show" role="alert">
      {{ session('success_register') }}
      <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  
    @if (session()->has('loginError'))
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
      {{ session('loginError') }}
      <button type="button" class="btn" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
    @endif
  
    <form action="/login" method="POST" >
      @csrf
      <img class="mb-4" src="/images/JH FURNITURE_free-file.png" alt="" width="300px" height="70px">
      <h1 class="h3 mb-3 fw-normal text-center">Please sign in</h1>
  
      <div class="form-floating">
        <input type="Email" class="form-control  @error('email') is-invalid @enderror" 

        @if (Cookie::has('email'))
          value="{{Cookie::get('email')}}"   
        @endif 

        id="email" placeholder="name@example.com" name="email" autofocus required value="{{ old ('email') }}">
        <label for="email">Email address</label>
        @error('email')
            <div class="text-danger">{{ $message }} </div>
        @enderror
      </div>
      <div class="form-floating">
        <input type="Password" class="form-control  @error('password') is-invalid @enderror" 

        @if (Cookie::has('password'))
          value="{{Cookie::get('password')}}"
        @endif 

        id="password" placeholder="password" name="password">
        <label for="password">Password</label>
        @error('password')
            <div class="text-danger">{{ $message }} </div>
        @enderror
      </div>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" 

          @if (Cookie::has('password'))
            checked
          @endif 

        value="1" name="remember"> Remember me
        </label>
      </div>
      <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
      <small class="d-block text-center">Not Registered? <a href="/register">Register Now!</a></small>
    </form>
  </main>
@endsection
