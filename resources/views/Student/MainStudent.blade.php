<!DOCTYPE html>
    <html>
    <head>
        <title></title>

        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">

        <link rel="stylesheet" type="text/css" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	    <link  rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
        <script type="text/javascript" src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
        <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
          
      
    </head>
   
    <body>
    
   
<!--                NavBar                     -->
<nav class="navbar navbar-expand-lg ">
  <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('img/logo.jpg')}}"></a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarText">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="{{url('/')}}">Home <span class="sr-only">(current)</span></a>
      </li>
     
      @if(auth()->user() == null)
      <li class="nav-item"><a class="nav-link" href="{{url('/login_system')}}">Courses</a></li>
      @elseif(auth()->user()->category == "Admin")
      <li class="nav-item"> <a class="nav-link" href="{{url('/login_system')}}">Dashboard</a></li>
      @else
      <li class="nav-item"> <a class="nav-link" href="{{url('/login_system')}}">Courses</a></li>
      @endif
      
      <li class="nav-item">
        <a class="nav-link" href="{{url('/contactUs')}}">Contact Us</a>
      </li>
      

      @if(auth()->user() != null)
      <li class="nav-item">
        <a class="nav-link" href="{{route('user.show_profile', auth()->user()->id)}}">Profile</a>

      </li>
      @endif

      

    </ul>
    <!-- Authentication -->
    <span class="navbar-text">
                         <!-- Right Side Of Navbar -->
                         <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                            </li>
                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                       onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
    </span>
  </div>
</nav>   

    <!-- page-content -->
   <main class="page-content container">
    <div class="">

    
      
        @yield('User_content')
    
    </div>
  </main>
  


    <!--                  Footer                    -->
    
    <footer class="footer-section  ">  
        <div class=" text-center">
       
            <p>
            Copyright &copy;2022 All rights reserved  <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Elham samir</a>
            </p>
            
        </div>
        <div class="clear"></div>

    </footer>
 </body>
</html>
