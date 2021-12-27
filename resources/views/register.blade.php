@extends('layout.layout')
@section('content')
<div class="container">
  <div class="row d-flex justify-content-center">
    <div class="col-md-4 mt-2">
      <div class="form-register">
        <form method="POST" action="/register">
          @csrf
          <h1 class="mb-3 fw-normal text-center">Please Register</h1>

          <div class="form-floating">
            <input type="text" class="form-control  @error('name') is-invalid @enderror" id="name" name="name" placeholder="Full Name">
            <label for="name">Full Name</label>
            @error('name')
                <div class="text-danger">{{ $message }} </div>  
            @enderror
          </div>

          <div class="form-floating">
            <input type="email" class="form-control  @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email">
            <label for="email">Email</label>
            @error('email')
                <div class="text-danger">{{ $message }} </div>
            @enderror
          </div>

          <div class="form-floating">
            <input type="password" class="form-control  @error('password') is-invalid @enderror" id="password" placeholder="password" name="password">
            <label for="password">Password</label>
            @error('password')
                <div class="text-danger">{{ $message }} </div>
            @enderror
          </div>

          <div class="form-floating">
            <input type="text" class="form-control  @error('address') is-invalid @enderror" id="address" placeholder="Address" name="address">
            <label for="address">Address</label>
            @error('address')
                <div class="text-danger">{{ $message }} </div>
            @enderror
          </div>

          <fieldset class="form-floating">
            <div class="row">
              <legend class="col-form-label col-sm-2 pt-0">Gender</legend>
              <div class="col-sm-10">
                <div class="form-check">
                  <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="gender" value="M">
                  <label class="form-check-label" for="gender">
                    M
                  </label>
                </div>
                <div class="form-check">
                  <input class="form-check-input @error('gender') is-invalid @enderror" type="radio" name="gender" id="gender" value="F">
                  <label class="form-check-label" for="gender">
                    F
                  </label>
                </div>
                @error('gender')
                  <div class="text-danger">{{ $message }} </div>
                @enderror
              </div>
            </div>
          </fieldset>
          
          <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
          <small class="d-block text-center">Already Registered? <a href="/login">Login Now!</a></small>
        </form>
      </div>
    </div>
  </div>
</div>
@endsection
