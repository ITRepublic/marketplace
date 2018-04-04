<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}" /> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>@yield('title') :: IT Republic</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" type="text/css" href="//fonts.googleapis.com/css?family=Raleway" />
        <link rel="stylesheet" href="{{ asset('css/common.css') }}">
        <link rel="stylesheet" href="{{ asset('css/navbar.css') }}">
        <link rel="stylesheet" href="http://fontawesome.io/assets/font-awesome/css/font-awesome.css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>
        
    </head>
    <body>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#"><img class="img-fluid" src="{{asset('image/itrepublic_logo.png')}}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                <?php
                    $group = session()->get('group_check');
                    if ($group == "JF")
                    {
                        ?>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('profile') }}">
                        	Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('marketplace') }}">
                            Search Job
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('history') }}">
                            History
                        </a>
                    </li>
                        <?php
                    }
                    elseif ($group == "JC")
                    {
                        ?>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('jobregistration') }}">
                            Register Job
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('resume') }}">
                            Resume
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('companyprofile') }}">
                            Company Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('jobagreement') }}">       	
                            Job Agreement
                        </a>
                    </li>
                        <?php
                    }
                    else
                    {
                        ?>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('jobregistration/all') }}">
                            All Register Job
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('resume/all') }}">
                            All Resume
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('jobagreement/all') }}">       	
                            All Job Agreement
                        </a>
                    </li>
                        <?php
                    };
                ?>
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
                  <a href="{{ route('logout') }}" class="ml-3"><i class="fa fa-sign-out mr-1"></i>Logout</a>
                </div>
            </div>
        </nav>
        
        <section class="container-fluid">
            @include('error.template')
            @yield('content')
        </section>
    </body>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
</html>
