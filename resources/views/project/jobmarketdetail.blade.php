@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
        <div class="row" align-items-center>
            <div class="card col-md-10 offset-md-1">
                <div class="card-body">

                {{ Form::open(array('url' => 'jobmarket/store', 'method' => 'POST')) }}
                {{ csrf_field() }}
                {{ Form::hidden('JobID', $JobMasterModel->JobID, array('id' => 'TxtJobID')) }}
                <div class="form-group">
                    <h3>{{ $JobMasterModel->JobTitle }}</h3>
                </div>
                <div class="form-group row">
                {{ Form::label('CompanyName', 'Company Name', array('class' => 'col-sm-4 col-form-label')) }}
                <?php $editsession = session()->get('detailjobmarketsession'); ?> 
                <div class="col-sm-8">
                    {{ Form::text('CompanyName', $JobMasterModel->CompanyName, array('class' => 'form-control', 'readonly' => 'true' )) }}
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
                        {{ Form::textarea('JobDescription', $JobMasterModel->Description, array('class' => 'form-control', $editsession == 'edit' ? '' : 'readonly' => 'true', 'rows' => '3')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobStatus', 'Job Status', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    <?php if ($editsession == 'view')
                    {
                        ?>
                            {{ Form::text('JobStatus', $JobMasterModel->StatusName, array('class' => 'form-control', 'readonly' => 'true')) }}
                        <?php
                    }else
                    {
                        ?>
                            {{ Form::select('JobStatus', $JobStatus, $JobMasterModel->StatusID, array('class' => 'form-control', 'id' => 'DdlJobStatus')) }}
                        <?php
                    }
                    ?>
                    
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobExpiredDate', 'Expired Date', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('JobExpiredDate', $JobMasterModel->ExpiredDate, array('class' => 'form-control', 'id' => $editsession == 'edit' ? 'datepicker' : '' , 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('Currency', 'Currency', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    <?php if ($editsession == 'view')
                    {
                        ?>
                            {{ Form::text('Currency', $JobMasterModel->CurrencyName, array('class' => 'form-control', $editsession == 'edit' ? '' : 'readonly' => 'true')) }}
                        <?php
                    }else
                    {
                        ?>
                            {{ Form::select('Currency', $Currency, $JobMasterModel->CurrencyID, array('class' => 'form-control', 'id' => 'DdlCurrency')) }}
                        <?php
                    }
                    ?>
                    
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobPrice', 'Job Price', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::text('JobPrice', $JobMasterModel->PriceList, array('class' => 'form-control', $editsession == 'edit' ? '' : 'readonly' => 'true')) }}
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
               <?php
                    $group = session()->get('group_check');
                    if ($group == "admin")
                    {
                        if ($editsession == 'view')
                        {
                            ?>
                                <a class="btn btn-primary col-md-3 my-1" href="{{ route('editdetailJobMarket', $JobMasterModel->JobID) }}">
                                    Edit this job
                                </a>
                            <?php
                        }else
                        {
                            ?>
                                {{ Form::submit('Submit edit', array('class' => 'btn btn-primary col-md-3 my-1')) }}
                            <?php
                        }
                    }else
                    {
                        ?>
                            {{ Form::submit('Apply for this job', array('class' => 'btn btn-primary col-md-3 my-1')) }}
                    <?php
                    }
               ?>
               
                {{ Form::close() }}
                   
                </div>
            </div>
        </div>
    </div>

@stop