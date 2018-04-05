@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
        <div class="row" align-items-center>
            <div class="card col-md-10 offset-md-1">
                <div class="card-body">

                {{ Form::open(array('url' => 'profile/store', 'method' => 'POST')) }}
                {{ csrf_field() }}
                <div class="form-group">
                    <h3>Company Profile</h3>
                </div>
                <div class="form-group row">
                    {{ Form::label('CompanyName', 'Company Name', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('CompanyName',  $JobCreateModel->CompanyName , array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('EmailAddress', 'Email Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::email('EmailAddress', $JobCreateModel->EmailAddress, array('class' => 'form-control', 'readonly' => 'true', 'id' => 'email')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('CompanyAddress', 'Company Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('CompanyAddress', $JobCreateModel->CompanyAddress, array('class' => 'form-control', 'rows' => '3')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('Phone', 'Phone', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('Phone', $JobCreateModel->Phone, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobTypeUsed', 'Job Type Used', array('class' => 'col-sm-4 col-form-label')) }}

                    <div class="table-responsive">
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Job Type</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($JobTypeUsed as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->JobTypeDesc }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        <table>
                    </div>
                </div>
                {{ Form::submit('Save', array('class' => 'btn btn-primary col-md-3 my-1')) }}
                {{ Form::close() }}
                   
                </div>
            </div>
        </div>
    </div>

@stop