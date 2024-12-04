<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Responsive sidebar template with sliding effect and dropdown menu based on bootstrap 3">
    <title>Admin</title>
    <link rel="stylesheet" type="text/css" href="{{ asset('css/dashboard.css')}}">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/main.css')}}">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm"
        crossorigin="anonymous">
    <link href="https://use.fontawesome.com/releases/v5.0.6/css/all.css" rel="stylesheet">
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
   


</head>

<body>
    <div class="page-wrapper chiller-theme toggled">
        <a id="show-sidebar" class="btn btn-sm btn-dark" href="#">
            <i class="fas fa-bars"></i>
        </a>
        <nav id="sidebar" class="sidebar-wrapper">
            <div class="sidebar-content">
                <div class="sidebar-brand">
                    <a href="#">Dashboard</a>
                    <div id="close-sidebar">
                        <i class="fas fa-times"></i>
                    </div>
                </div>
                <div class="sidebar-header">
                    <div class="user-pic">
                        <img class="img-responsive img-rounded" src="{{ URL::asset('img/icon.jpg') }}" alt="Image"/>
                    </div>
                    <div class="user-info">
                        <span class="user-name">
                            <strong>{{auth()->user()->name}}</strong>
                        </span>
                        <span class="user-role">Admin</span>
                    
                    </div>
                </div>
                <!--   menu -->
                <div class="sidebar-menu">
                    <ul>
                        <li class="header-menu">
                            <span>General</span>
                        </li>
                        <li class="sidebar-dropdown">
                            <a href="#">
                                <i class="fa fa-tachometer-alt"></i><span>User</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{{url('/show_all_users')}}">Show Users</a></li>
                                    <li> <a href="{{url('/create_User')}}">Create User </a> @csrf </li>
                                </ul>
                            </div>
                        </li>

                        <!--        Course part  -->
                        <li class="sidebar-dropdown">
                            <a href="#"> 
                                <i class="fa fa-tachometer-alt"></i> <span>Course</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{{url('/show_all_Courses')}}">Show Courses</a></li>
                                    <li><a href="{{url('/create_Course')}}">Create Course </a>@csrf </li>
                                    
                                </ul>
                            </div>
                        </li>

                        <!--      Assigning  Course part  -->
                        <li class="sidebar-dropdown">
                            <a href="#"> 
                                <i class="fa fa-tachometer-alt"></i> <span>Assigning Courses</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{{url('/assign_Course_teacher')}}">Assign Course to Teacher</a></li>
                                    <li><a href="{{url('/assign_Course_student')}}">Assign Course to Student </a> </li>
                                    <li><a href="{{url('/show_all_assign_Course_teacher')}}">Show Assign Course to Teacher</a></li>
                                    <li><a href="{{url('/show_all_assign_Course_student')}}">Show Assign Course to Student </a> </li>
                                    
                                </ul>
                            </div>
                        </li>

                        <!--      Session part  -->
                        <li class="sidebar-dropdown">
                            <a href="#"> 
                                <i class="fa fa-tachometer-alt"></i> <span>Sessions</span>
                            </a>
                            <div class="sidebar-submenu">
                                <ul>
                                    <li><a href="{{url('/Show_sessions_Admin')}}">Show Session</a></li>
                                    
                                </ul>
                            </div>
                        </li>
                    
                    </ul>
                    
                </div>
                <!-- sidebar-menu  -->
            </div>
            <!-- sidebar-content  -->
            <div class="sidebar-footer">
                <a href="{{url('/Show_unreaded_ContactUs')}}">
                    <i class="fa fa-envelope"></i>
                </a>
            </div>

  
        </nav>


        <!---------------------------- Nav authentication------------------------------>
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm page-content">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    <img src="{{ asset('img/logo.jpg')}}">
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
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
        
                </div>
            </div>
        </nav>
        <!-- sidebar-wrapper  -->
        <main class="page-content">
            <div class="container-fluid">
                @yield('content')
            </div>
            

            <footer class="text-center">
                <div class="mb-2">
                    <small>
                        <p>Copyright &copy;2022 All rights reserved  <i class="icon-heart color-danger" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank">Elham samir</a></p>
                    </small>
                </div>
            </footer>
        </main>
        <!-- page-content" -->      
            
    </div>

    <!-- page-wrapper -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script>
    
        jQuery(function ($) {

            $(".sidebar-dropdown > a").click(function() {
            $(".sidebar-submenu").slideUp(200);
            if (
            $(this)
            .parent()
            .hasClass("active")
            ) {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
            .parent()
            .removeClass("active");
            } else {
            $(".sidebar-dropdown").removeClass("active");
            $(this)
            .next(".sidebar-submenu")
            .slideDown(200);
            $(this)
            .parent()
            .addClass("active");
            }
            });

            $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
            });
            $("#show-sidebar").click(function() {
            $(".page-wrapper").addClass("toggled");
            });




        });
   
    </script> 
</body>

</html>