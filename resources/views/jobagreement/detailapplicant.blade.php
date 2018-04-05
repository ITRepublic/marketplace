@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
        <div class="row" align-items-center>
            <div class="card col-md-10 offset-md-1">
                <div class="card-body">

                {{ Form::open(array('url' => 'jobagreement/storeapplicant', 'method' => 'POST')) }}
                {{ csrf_field() }}
                <div class="form-group">
                    <h3>Profile</h3>
                </div>
                <div class="form-group row">
                    {{ Form::label('UserName', 'Username', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('UserName',  $JobFinderModel->UserName , array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('EmailAddress', 'Email Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::email('EmailAddress', $JobFinderModel->EmailAddress, array('class' => 'form-control', 'readonly' => 'true', 'id' => 'email')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('Address', 'Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('Address', $JobFinderModel->Address, array('class' => 'form-control', 'rows' => '3', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('Phone', 'Phone', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('Phone', $JobFinderModel->Phone, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="table-responsive">
                        <h3>Skill Lists</h3>
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Skill Name</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($SkillList as $index => $item)
                                    <tr>
                                        <td>{{ $index + 1 }}</td>
                                        <td>{{ $item->SkillType }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        <table>
                </div>
                
                {{ Form::submit('Approve', array('class' => 'btn btn-primary col-md-3 my-1')) }}
                {{ Form::close() }}
                   
                </div>
            </div>
        </div>
    </div>

@stop