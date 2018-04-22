@extends('layout.master')

@section('content')
<div class="row" align-items-center>
    <div class="card col-md-6 offset-md-3">
        <div class="card-body">

        {{ Form::open(array('url' => 'job_creator/store', 'method' => 'POST')) }}
        <h3 class="py-3">Job Creator Account</h3> <hr>

        <div class="form-group row">
            {{ Form::label('company_name', 'Company Name', array('class' => 'col-sm-4 col-form-label')) }}
            <div class="col-sm-8">
                {{ Form::text('company_name', old('company_name'), array('class' => 'form-control', 'placeholder' => 'input company name')) }}
            </div>
        </div>
        <div class="form-group row">
            {{ Form::label('company_address', 'Company Address', array('class' => 'col-sm-4 col-form-label')) }}
            <div class="col-sm-8">
                {{ Form::textarea('company_address', old('company_address'), array('class' => 'form-control', 'rows' => '5', 'placeholder' => 'input company address')) }}
            </div>
        </div>
        <div class="form-group row">
            {{ Form::label('company_profile', 'Company Profile', array('class' => 'col-sm-4 col-form-label')) }}
            <div class="col-sm-8">
                {{ Form::textarea('company_profile', old('company_profile'), array('class' => 'form-control', 'rows' => '5', 'placeholder' => 'input company profile')) }}
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