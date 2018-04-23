@extends('layout.master')

@section('content')
<div class="row" align-items-center>
    <div class="card col-md-6 offset-md-3">
        <div class="card-body">
            <h3 class="py-3">Forgot Password</h3> <hr>

            <form action="{{ url('forgot-password') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                
                <div class="form-group row">
                    <label class="col-sm-2 col-form-label">Account Type</label>
                    <div class="col-md-10">
                        <div class="form-check">
                            <input type="radio" name="account_type" id="jobcreator" value="jc" checked>
                            <label class="form-check-label" for="jobcreator">
                                Job Creator
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="account_type" id="jobfinder" value="jf">
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
                <div class="form-group">
                    <button type="submit" class="btn btn-outline-primary col-md-2">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection