@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
    <div class="row" align-items-center>
        <div class="card col-md-10 offset-md-1">
            <div class="card-body">
                {{ Form::open(array('url' => 'jobagreement/storestatus', 'method' => 'POST')) }}
                {{ csrf_field() }}
                <div class="form-group">
                    <h3>{{ $JobMasterModel->JobTitle }}</h3>
                </div>
                <?php
                    $group = session()->get('group_check');
                ?>

                <div class="form-group row">
                {{ Form::label('CompanyName', 'Company Name', array('class' => 'col-sm-4 col-form-label')) }}
                <div class="col-sm-8">
                    {{ Form::text('CompanyName', $JobMasterModel->CompanyName, array('class' => 'form-control', 'readonly' => 'true')) }}
                </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('EmailAddress', 'Email Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::email('EmailAddress', $JobMasterModel->JCEmailAddress, array('class' => 'form-control', 'readonly' => 'true', 'id' => 'email')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobDescription', 'Job Description', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('JobDescription', $JobMasterModel->Description, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobStatus', 'Job Status', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::text('JobStatus', $JobMasterModel->StatusName, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobExpiredDate', 'Expired Date', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('JobExpiredDate', $JobMasterModel->ExpiredDate, array('class' => 'form-control', 'id' => 'expireddatepicker', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('Currency', 'Currency', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::text('Currency', $JobMasterModel->CurrencyName, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobPrice', 'Job Price', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::text('JobPrice', $JobMasterModel->PriceList, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobStatus', 'Job Status', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::select('JobStatus', $JobStatus, null, array('class' => 'form-control', 'id' => 'DdlJobStatus', $group != 'admin' ? '' : 'disabled' => 'true')) }}
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
                            @foreach($JobMatchTypeModel as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->JobTypeDesc }}</td>
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
                            @foreach($SkillList as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->SkillType }}</td>
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
                            @foreach($JobApplicantModel as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a class=<?php $group == 'admin' ? 'disabled' : 'btn btn-danger btn-sm'?> href="{{ route('detailJobAgreementApplicant', $item->finderid) }}">
                                            Detail
                                        </a>
                                    </td>
                                    <td>{{ $item->EmailAddress }}</td>
                                    <td>{{ $item->UserName }}</td>
                                    <td>{{ $item->StatusName }}</td>                                
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
                            @foreach($JobMatchSearchApplicant as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->EmailAddress }}</td>
                                    <td>{{ $item->UserName }}</td>
                                    <td>{{ $item->StatusName }}</td>                                
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