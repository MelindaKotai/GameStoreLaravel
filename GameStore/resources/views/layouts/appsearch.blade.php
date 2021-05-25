<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    <!-- BOOTSTRAP -->

  <!-- CSS -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css" integrity="sha384-TX8t27EcRE3e/ihU7zmQxVncDAy5uIKz4rEkgIXeMed4M0jlfIDPvg6uqKI2xXr2" crossorigin="anonymous">

  <!-- jQuery and JS bundle w/ Popper.js -->
  <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ho+j7jyWK8fNQe+A12Hb8AhRq26LrZ/JpcUGGOn+Y7RsweNrtN/tE3MoK7ZeZDyx" crossorigin="anonymous"></script>
  

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  
 
<body>
 <div id="app">
<nav class="navbar navbar-expand-md navbar-dark bg-danger pl-5 pb-1 pt-0" >
        <a class="navbar-brand" style="font-family: Brush Script MT, Brush Script Std, cursive;font-size: 25px;" href="/">
        <img src="../pixlr-bg-result (1).png" height="75px" width="70px" class="align-item-center">The Dice Knighthood
        </a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
          <form class="form-inline my-2 my-lg-0 ml-auto" action="{{Route('produse')}}" method="get">
           <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search" name="search">
           <button class="btn btn-outline-light my-2 my-sm-0" type="submit">Search</button>
           </form>
          <ul class="navbar-nav ml-auto" style="font-size:20px;">
            <li class="nav-item">
              <a class="nav-link" href="#Contact">Contact</a> 
            </li>
            @auth
            @if(Auth::user()->rol=='client')
      
          <li class="nav-item">
            <a class="nav-link" href="/Cos"><i class="fa fa-shopping-cart" style="font-size:24px"></i>  {{ count((array) session('cart')) }}</a>
          </li>
          @endif
          @endauth
          @auth
             @if(Auth::user()->rol=='admin')
           <li class="nav-item">
            <a class="nav-link" href="/Create">Produs Nou</a>
            </li> 
          <li class="nav-item">
            <a class="nav-link" href="/Users">Clienti</a>
          </li>
          
        
          @endif
          @endauth
          @auth
          <li class="nav-item">
            <a class="nav-link" href="/MyAccount">MyAccount</a>
          </li>
          <li class="nav-item">
             <a class="nav-link" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
           
          </li>
           </ul>
      </div>
    </nav>
    @else
      <li class="nav-item">
            <a class="nav-link" href={{Route('login')}}>Login</a>
            </li> 
          <li class="nav-item">
            <a class="nav-link" href="{{Route('register')}}">Register</a>
        </ul>
      </div>
    </nav>
    @endauth

        <main class="py-4">
            @yield('content')
        </main>
 <div id="Contact" class="pt-4">
    <footer class="page-footer font-small pt-3 pb-2 bg-danger">
      <div class="container" style="color:white;">
            <p><i class="fa fa-map-marker" style="font-size:24px;margin-right: 8px;"></i>  Adresa: Str. Bucuresti nr.2, Cluj-Napoca</p>
            <p><i class="fa fa-phone-square" style="font-size:24px;margin-right: 8px;"></i>Telefon: 0745234568</p>
            <p><i class="fa fa-calendar" style="font-size:24px;margin-right: 8px;"></i>Program: Luni-Vineri, 09:00-21:00</p>
            <p><i class="fa fa-envelope" style="font-size:24px;margin-right: 8px;"></i>E-mail: thediceknighthood@yahoo.com</p>
          </div>
    </footer>

</div>
</div>
 <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
