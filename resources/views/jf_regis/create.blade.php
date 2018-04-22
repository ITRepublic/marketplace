@extends('layout.master')

@section('content')
<div class="row" align-items-center>
    <div class="card col-md-6 offset-md-3">
        <div class="card-body">

        <h3 class="py-3">Job Finder Account</h3> <hr>

        {{ Form::open(array('url' => 'job_finder/store', 'method' => 'POST')) }}
        <div class="form-group row">
            {{ Form::label('name', 'Name', array('class' => 'col-sm-4 col-form-label')) }}
            <div class="col-sm-8">
                {{ Form::text('name', old('name'), array('class' => 'form-control', 'placeholder' => 'input name')) }}
            </div>
        </div>
        <div class="form-group row">
            {{ Form::label('address', 'Address', array('class' => 'col-sm-4 col-form-label')) }}
            <div class="col-sm-8">
                {{ Form::textarea('address', old('address'), array('class' => 'form-control', 'rows' => '5', 'placeholder' => 'input address')) }}
            </div>
        </div>
        <div class="form-group row">
            {{ Form::label('phone', 'Phone', array('class' => 'col-sm-4 col-form-label')) }}
            <div class="col-sm-8">
                {{ Form::text('phone', old('phone'), array('class' => 'form-control', 'placeholder' => 'input phone')) }}
            </div>
        </div>
        <div class="form-group row">
            {{ Form::label('email_address', 'Email Address', array('class' => 'col-sm-4 col-form-label')) }}
            <div class="col-sm-8">
                {{ Form::email('email_address', old('email_address'), array('class' => 'form-control', 'placeholder' => 'input email address')) }}
            </div>
        </div>
        <div class="form-group row">
            {{ Form::label('password', 'Password', array('class' => 'col-sm-4 col-form-label')) }}
            <div class="col-sm-8">
                {{ Form::password('password', array('id' => 'password', 'class' => 'form-control', 'placeholder' => 'input password')) }}
            </div>
        </div>
        <div class="form-group row">
            {{ Form::label('password_confirmation', 'Password Confirmation', array('class' => 'col-sm-4 col-form-label')) }}
            <div class="col-sm-8">
                {{ Form::password('password_confirmation', array('id' => 'password_confirmation', 'class' => 'form-control', 'placeholder' => 'input password confirmation')) }}
            </div>
        </div>

        {{ Form::submit('Register', array('class' => 'btn btn-outline-primary col-md-2 my-1')) }}

        {{ Form::close() }}
            
        </div>
    </div>
</div>
@endsection