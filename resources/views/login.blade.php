@extends('layout.master')

@section('content')
    <div class="row" align-items-center>
        <div class="card col-md-6 offset-md-3">
            <div class="card-body">
                <h3 class="py-3">Login</h3> <hr>

                <form action="{{ route('login') }}" method="post" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    
                    <div class="form-group">
                        <label>Login As</label>
                        <select name="login_as" class="form-control">
                            <option value="job_creator">Job Creator</option>
                            <option value="job_finder">Job Finder</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>E-mail</label>
                        <input type="email" name="email" class="form-control">
                    </div>
                    <div class="form-group">
                        <label>Password</label>
                        <input type="password" name="password" class="form-control">
                    </div>
                    <div class="form-group">
                        <p><a href="#" style="font-size: 12px;">Forgot password?</a></p>
                        <button type="submit" class="btn btn-primary col-md-3">Login</button>
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
