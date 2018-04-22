@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
    <div class="row" align-items-center>
        <div class="card col-md-10 offset-md-1">
            <div class="card-body">

            {{ Form::open(array('url' => 'job_market_regis/store_step_1', 'method' => 'POST')) }}
            {{ csrf_field() }}
            <div class="form-group">
                <h3>Creating Job (1st Step)</h3>
            </div>
            <div class="form-group row">
                {{ Form::label('job_title', 'Job Title', array('class' => 'col-sm-4 col-form-label')) }}
                <div class="col-sm-8">
                    {{ Form::text('job_title', old('job_title'), array('class' => 'form-control')) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('email_address', 'Email Address', array('class' => 'col-sm-4 col-form-label')) }}
                <div class="col-sm-8">
                    {{ Form::email('email_address', $job_create_model->email_address, array('class' => 'form-control', 'readonly' => 'true')) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('description', 'Job Description', array('class' => 'col-sm-4 col-form-label')) }}
                <div class="col-sm-8">
                    {{ Form::textarea('description', old('description'), array('class' => 'form-control', 'rows' => '3')) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('expired_date', 'Expired Date', array('class' => 'col-sm-4 col-form-label')) }}
                <div class="col-sm-8">
                    {{ Form::text('expired_date', '', array('class' => 'form-control', 'id' => 'datepicker', 'readonly' => 'true')) }}
                </div>
            </div>
            {{ Form::submit('Next to step 2', array('class' => 'btn btn-outline-primary col-md-3 my-1')) }}
            {{ Form::close() }}
                
            </div>
        </div>
    </div>
@stop