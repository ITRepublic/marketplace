@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
        <div class="row" align-items-center>
            <div class="card col-md-6 offset-md-3">
                <div class="card-body">

                {{ Form::open(array('url' => 'jobmarketregis/storestep1', 'method' => 'POST')) }}
                {{ csrf_field() }}
                <div class="form-group">
                    <h3>This is Job Registration (1st Step)</h3>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobTitle', 'Job Title', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('JobTitle', old('JobTitle'), array('class' => 'form-control')) }}
                    </div>
                </div>
               <div class="form-group row">
                    {{ Form::label('EmailAddress', 'Email Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::email('EmailAddress', $JobCreateModel->EmailAddress, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('Description', 'Job Description', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('Description', old('Description'), array('class' => 'form-control', 'rows' => '3')) }}
                    </div>
                </div>
                {{ Form::submit('Next to step 2', array('class' => 'btn btn-primary col-md-3 my-1')) }}
                {{ Form::close() }}
                   
                </div>
            </div>
        </div>
    </div>
@stop