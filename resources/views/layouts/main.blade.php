<!doctype html>
<html lang="en" class="h-100">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=0.5">
    <title>@yield('title')</title>
    @if(isset(Auth::user()->email))
        <meta name="csrf-token" content="{{ Session::token() }}"> 
        <meta name="userEmail" content="{{ Auth::user()->email }}"> 
    @endif
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
      html, body{
        height:100vh;
        margin:0em;
        padding:0em;
      }
      body{
        background-color:#8a8a8a;
      }
      .content{
        width:900px;
        height:100vh;
        position:absolute;
        /* top:50%; */
        left:50%;
        transform: translateX(-50%);
        background-color:#ffffff;
        overflow-y: auto;
      }
      .row{
        width:100%;
      }
      @media screen and (max-device-width: 600px){
        .content{
          width:100%
        }
      }
      .link-card, .link-card:link, .link-card:visited, .link-card:hover,  .link-card:active{
        text-decoration: none;
      }

      
    </style>
    @yield('style')
  </head>
  <body class="h-100" style="">
    <div class="content h-100">
      @if(Request::segment(1) != 'login' && Request::segment(1) != 'register' )
      <nav class="navbar fixed-top navbar-expand-sm navbar-dark bg-dark">
        <div class="container-fluid">
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse d-flex justify-content-center" id="navbarNavAltMarkup">
            @if(Auth::user()->role == 2)
            <div class="navbar-nav">
              <a class="nav-link @if(Request::segment(1) == 'isi-saldo') active @endif me-5" href="/isi-saldo" style="font-size: 40px;">Isi Saldo</a>
              <a class="nav-link @if(Request::segment(1) == 'permintaan-responden') active @endif me-5" href="/permintaan-responden" style="font-size: 40px;">Responden</a>
              <a class="nav-link @if(Request::segment(1) == 'profile') active @endif" href="/profile" style="font-size: 40px;">Profile</a>
            </div>
            @elseif(Auth::user()->kategori == 0)
            <div class="navbar-nav">
              <a class="nav-link @if(Request::segment(1) == 'dashboard') active @endif me-5" aria-current="page" href="/dashboard" style="font-size: 40px;">Home</a>
              <a class="nav-link @if(Request::segment(1) == 'history') active @endif me-5" href="/history" style="font-size: 40px;">History</a>
              <a class="nav-link @if(Request::segment(1) == 'profile') active @endif" href="/profile" style="font-size: 40px;">Profile</a>
            </div>
            @else
            <div class="navbar-nav">
              <a class="nav-link @if(Request::segment(1) == 'list-customer') active @endif me-5" href="/list-customer" style="font-size: 40px;">List Customer</a>
              <a class="nav-link @if(Request::segment(1) == 'profile') active @endif" href="/profile" style="font-size: 40px;">Profile</a>
            </div>
            @endif
          </div>
        </div>
      </nav>
      <div style="height: 100px;"></div>
      @endif
      @if(Auth::user())
      <div class="row mt-3">
          <div class="col d-flex justify-content-center" style="font-size: 30px;">
              {{ Auth::user()->name }}
          </div>
          <div class="col d-flex justify-content-center"  style="font-size: 30px;">
              Saldo : {{number_format(Auth::user()->saldo, 0, '','.')}}
          </div>
      </div>
      <hr>
      @endif
      @yield('content')
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    @yield('script')
  </body>
</html>