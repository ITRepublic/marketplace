<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="_token" content="{!! csrf_token() !!}" /> 
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Marketplace :: IT Republic</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="{{ asset('public/css/common.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/navbar.css') }}">
        <link rel="stylesheet" href="{{ asset('public/css/footer.css') }}">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
        <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>    
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
        <script src="http://malsup.github.com/jquery.form.js"></script>
        
    </head>
    <body>

        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{ route('index') }}"><img class="img-fluid" src="{{asset('public/image/itrepublic_logo.png')}}"></a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">

            @if(session('user_id'))
                <ul class="navbar-nav mr-auto">
                <?php
                    $group = session()->get('group_check');
                    if ($group == "jf")
                    {
                        ?>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('marketplace') }}">
                            Search Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('history') }}">
                            Contracts
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('profile') }}">
                        	My Profile
                        </a>
                    </li>
                        <?php
                    }
                    elseif ($group == "jc")
                    {
                        ?>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('project_list') }}">
                            Projects
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('resume') }}">
                            Resume
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('company_profile') }}">
                            My Profile
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('job_agreement') }}">       	
                            Contracts
                        </a>
                    </li>
                        <?php
                    }
                    else
                    {
                        ?>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ url('job_registration/all') }}">
                            All Register Job
                    </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('resume/all') }}">
                            All Resume
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ url('job_agreement/all') }}">       	
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
                  Hi, <span>{{ session('user_name') }}</span>
                  <a href="{{ route('logout') }}" class="btn btn-outline-primary ml-3">Logout</a>
                </div>
            @else
                <ul class="navbar-nav mr-auto"></ul>

                <ul class="navbar-nav">
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Register
                        </a>
                        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('createJobCreator') }}">Job Creator</a>
                        <a class="dropdown-item" href="{{ route('createJobFinder') }}">Job Finder</a>
                        </div>
                    </li>
                </ul>

                <div class="right-menu my-2 my-lg-0">
                    <a href="{{ route('getLogin') }}" class="btn btn-outline-primary">Login</a>
                </div>
            @endif
            </div>
        </nav>
        
        <div class="content-wrapper">
            @include('error.template')
            <div class="container-fluid my-3">
                @yield('content')
            </div>
        </div>

        <div class="footer">
            <ul>
                <li><a href="">Privacy Policy</a></li>
                <li><a href="">Terms & Conditions</a></li>
                <li><a href="">How It Works</a></li>
            </ul>
            <p class="copyright">Copyright &copy; 2018 IT Republic. All rights reserved.</p>
        </div>


    </body>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
        <script>
        $(function() {
            $( "#datepicker" ).datepicker();
        });
    </script>
</html>
