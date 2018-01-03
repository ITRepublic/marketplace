<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') :: IT Republic</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img class="img-fluid" src="{{asset('image/itrepublic_logo.png')}}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <?php
                $group = session()->get('group_check');
                
                $menulist = DB::table('usermenu')
                ->select('usermenuid', 'menuname', 'urlroutemenu')
                ->leftjoin('mastermenu', 'mastermenu.menuid', '=', 'usermenu.menuid')
                ->where('usermenu.groupid', $group)
                ->get();
            ?>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                @foreach($menulist as $index => $value)
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url($value->urlroutemenu) }}">{{ $value->menuname }}
                        </a>
                    </li>
                @endforeach
                    <!-- <li class="nav-item active">
                        <a class="nav-link" href="#">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Link</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Dropdown
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#">Action</a>
                        <a class="dropdown-item" href="#">Another action</a>
                        <div class="dropdown-divider"></div>
                        <a class="dropdown-item" href="#">Something else here</a>
                        </div>
                    </li> -->
                </ul>
                <div class="right-menu my-2 my-lg-0">
                  Hi, {{ session('user_name') }}
                  <a href="" class="ml-3"><i class="fa fa-user mr-1"></i>Profile</a>
                  <a href="{{ route('logout') }}" class="ml-3"><i class="fa fa-sign-out mr-1"></i>Logout</a>
                </div>
            </div>
        </nav>
        
        <section class="container-fluid">
            @include('error.template')
            @yield('content')
        </section>
    </body>
</html>
