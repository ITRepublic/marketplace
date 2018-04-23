@extends('layout.master')

@section('content')
<div class="row" align-items-center>
    <div class="card col-md-6 offset-md-3">
        <div class="card-body">
            <h3 class="py-3">Reset Password</h3> <hr>

            <form action="{{ url('password/reset') }}" method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
            
                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">New Password</label>
                    <div class="col-md-8"><input type="password" name="new_password" class="form-control"></div>
                </div>

                <div class="form-group row">
                    <label class="col-sm-4 col-form-label">Password Confirmation</label>
                    <div class="col-md-8"><input type="password" name="password_confirmation" class="form-control"></div>
                </div>

                <div class="form-group">
                    <input type="hidden" name="email" value="{{$email}}">
                    <input type="hidden" name="account_type" value="{{$account_type}}">
                    <button type="submit" class="btn btn-outline-primary col-md-2">Submit</button>
                </div>

            </form>
        </div>
    </div>
</div>
@endsection