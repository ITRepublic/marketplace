<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Welcome :: IT Republic</title>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
        <link rel="stylesheet" href="{{ asset('public/css/common.css') }}">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    </head>
    <body>
        <div class="container-fluid">
            <center><img class="img-fluid" src="{{asset('public/image/itrepublic_logo.png')}}" style="margin-top: 4%; margin-bottom: 2%;"></center>
            <div class="row" align-items-center>
                <div class="card col-md-6 offset-md-3">
                    <div class="card-body">
                    <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                        {{ csrf_field() }}

                        @include('error.template')
                        
                        <div class="form-group">
                            <label><i class="fa fa-sign-in pr-1"></i>Login As</label>
                            <select name="login_as" class="form-control">
                                <option value="job_creator">Job Creator</option>
                                <option value="job_finder">Job Finder</option>
                            </select>
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-envelope pr-2"></i>E-mail</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label><i class="fa fa-lock pr-2"></i>Password</label>
                            <input type="password" name="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary col-md-3"><i class="fa fa-sign-in pr-1"></i>Login</button>
                        </div>
                        <div class="form-group">
                            <label>Create Account:</label> <br>
                            <a class="btn btn-danger col-md-3 my-1" href="{{ url('job_creator/create') }}">
                                <i class="fa fa-user pr-1"></i>Job Creator
                            </a>
                            <a class="btn btn-success col-md-3 my-1" href="{{ url('job_finder/create') }}">
                                <i class="fa fa-user pr-1"></i>Job Finder
                            </a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>
