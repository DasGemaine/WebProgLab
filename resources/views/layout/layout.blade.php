<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/css/style.css", rel="stylesheet">
  </head>
  <body>
      <div class="header"></div>
        <nav class="navbar navbar-expand-lg navbar-light" style="background-color:#3e3f52">
          <div class="container">
            <a class="navbar-brand" href="/">
              <img src="{{url('/images/JH FURNITURE_free-file (2).png')}}" alt="" width="280px" height="60px">
            </a>
          </div>
            <div class="container">
              <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav ms-auto">
                  <li class="nav-item me-5">
                    <a class="nav-link active text-white" href="/">Home</a>
                  </li>
                  <li class="nav-item me-5">
                    <a class="nav-link active text-white" href="/view">View</a>
                  </li>
                    @auth
                      @if (Auth::user()->role == 'Admin')
                          <li class="nav-item me-5">
                              <a class="nav-link active text-white" href="/profile">Profile</a>
                          </li>
                          <li class="nav-item me-5">
                              <a class="nav-link active text-white" href="/addFurniture">Add Furniture</a>
                          </li>
                          <li>
                              <form action="/logout" method="POST">
                              @csrf
                                  <div class="card-update">
                                      <button type="submit" class="btn btn-xl btn-danger">Log out</button> 
                                  </div>
                              </form>
                          </li>
                      @else
                          <li class="nav-item me-5">
                              <a class="nav-link active text-white" href="/profile">Profile</a>
                          </li>
                          <li class="nav-item me-5">
                              <a class="nav-link active text-white" href="/cart">Cart</a>
                          </li>
                          <li>
                              <form action="/logout" method="POST">
                              @csrf
                                  <div class=" card-update">
                                      <button type="submit" class="btn btn-danger">Log out</button> 
                                  </div>
                              </form>
                          </li>
                      @endif
                    @else
                        <li class="nav-item me-5">
                            <a class="nav-link active text-white" href="/login">Login</a>
                        </li>
                        <li class="nav-item me-5">
                            <a class="nav-link active text-white" href="/register">Register</a>
                        </li>
                    @endauth
                </ul>
              </div>
            </div>
          </div>
        </nav>
      </div>
    <div class="bg-image">
      <div class="content">
        <div class="main pt-4 pb-4">
          <div class="content-container">
            @yield('content')
          </div>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
      </div>
      @include("footer.footer")
    </div>
  </body>
</html>