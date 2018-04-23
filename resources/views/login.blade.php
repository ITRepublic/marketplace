@extends('layout.master')

@section('content')
    <div class="row" align-items-center>
        <div class="card col-md-6 offset-md-3">
            <div class="card-body">
                <h3 class="py-3">Login</h3> <hr>

                <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Login as</label>
                        <div class="col-md-10">
                            <div class="form-check">
                                <input type="radio" name="login_as" id="jobcreator" value="job_creator" checked>
                                <label class="form-check-label" for="jobcreator">
                                    Job Creator
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="login_as" id="jobfinder" value="job_finder">
                                <label class="form-check-label" for="jobfinder">
                                    Job Finder
                                </label>
                            </div>
                        </div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">E-mail</label>
                        <div class="col-md-10"><input type="email" name="email" class="form-control" placeholder="input your email" value="{{ old('email') }}"></div>
                    </div>
                    <div class="form-group row">
                        <label class="col-sm-2 col-form-label">Password</label>
                        <div class="col-md-10"><input type="password" name="password" class="form-control" placeholder="input your password"></div>
                    </div>
                    <div class="form-group">
                    <p><a href="{{ url('/forgot-password') }}" style="font-size: 12px;">Forgot password?</a></p>
                        <button type="submit" class="btn btn-outline-primary col-md-2">Login</button>
                    </div>
                    {{-- <div class="form-group">
                        <label>Create Account:</label> <br>
                        <a class="btn btn-danger col-md-3 my-1" href="{{ route('createJobCreator') }}">
                            <i class="fa fa-user pr-1"></i>Job Creator
                        </a>
                        <a class="btn btn-success col-md-3 my-1" href="{{ route('createJobFinder') }}">
                            <i class="fa fa-user pr-1"></i>Job Finder
                        </a>
                    </div> --}}
                </form>
            </div>
        </div>
    </div>
@endsection
