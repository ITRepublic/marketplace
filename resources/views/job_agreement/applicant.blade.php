@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
    <div class="row" align-items-center>
        <div class="card col-md-10 offset-md-1">
            <div class="card-body">
                {{ Form::open(array('url' => 'job_agreement/store_status', 'method' => 'POST')) }}
                {{ csrf_field() }}
                <div class="form-group">
                    <h3>{{ $job_master_model->job_title }}</h3>
                </div>
                <?php
                    $group = session()->get('group_check');
                ?>

                <div class="form-group row">
                {{ Form::label('company_name', 'Company Name', array('class' => 'col-sm-4 col-form-label')) }}
                <div class="col-sm-8">
                    {{ Form::text('company_name', $job_master_model->company_name, array('class' => 'form-control', 'readonly' => 'true')) }}
                </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('email_address', 'Email Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::email('email_address', $job_master_model->jc_email_address, array('class' => 'form-control', 'readonly' => 'true', 'id' => 'email')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('job_description', 'Job Description', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('job_description', $job_master_model->description, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('job_status', 'Job Status', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::text('job_status', $job_master_model->status_name, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('job_expired_date', 'Expired Date', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('job_expired_date', $job_master_model->expired_date, array('class' => 'form-control', 'id' => 'expired_date_picker', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('currency', 'Currency', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::text('currency', $job_master_model->currency_name, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('job_price', 'Job Price', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::text('job_price', $job_master_model->price_list, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('job_status', 'Job Status', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::select('job_status', $job_status, null, array('class' => 'form-control', 'id' => 'ddl_job_status', $group != 'admin' ? '' : 'disabled' => 'true')) }}
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Common Skill Required</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($job_match_type_model as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->job_type_desc }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    <table>
                </div>               
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Preferred Skill</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($skill_list as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->skill_type }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    <table>
                </div>
                <div class="form-group">
                    <h3>Applicant List</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Action</th>
                                <th>Email</th>
                                <th>User Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($job_applicant_model as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a class=<?php $group == 'admin' ? 'disabled' : 'btn btn-danger btn-sm'?> href="{{ route('detail_job_agreement_applicant', $item->finder_id) }}">
                                            Detail
                                        </a>
                                    </td>
                                    <td>{{ $item->email_address }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->status_name }}</td>                                
                                </tr>
                            @endforeach
                        </tbody>
                    <table>
                </div>
                <div class="form-group">
                    <h3>Accepted Applicant List</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Email</th>
                                <th>User Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($job_match_search_applicant as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->email_address }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->status_name }}</td>                                
                                </tr>
                            @endforeach
                        </tbody>
                    <table>
                </div>
                <?php
                    $group = session()->get('group_check');
                    if ($group != "admin")
                    {
                        ?>
                            {{ Form::submit('Submit', array('class' => 'btn btn-primary col-md-3 my-1')) }}
                        <?php
                    }
                ?>
                
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<script>
        .disabled {
            pointer-events: none;
            cursor: default;
         }
    </script>
@stop