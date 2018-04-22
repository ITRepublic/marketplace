@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
        <div class="row" align-items-center>
            <div class="card col-md-10 offset-md-1">
                <div class="card-body">

                {{ Form::open(array('url' => 'job_market/store', 'method' => 'POST')) }}
                {{ csrf_field() }}
                {{ Form::hidden('job_id', $job_master_model->job_id, array('id' => 'txt_job_id')) }}
                <div class="form-group">
                    <h3>{{ $job_master_model->job_title }}</h3>
                </div>
                <div class="form-group row">
                {{ Form::label('company_name', 'Company Name', array('class' => 'col-sm-4 col-form-label')) }}
                <?php $edit_session = session()->get('detail_job_market_session'); ?> 
                <div class="col-sm-8">
                    {{ Form::text('company_name', $job_master_model->company_name, array('class' => 'form-control', 'readonly' => 'true' )) }}
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
                        {{ Form::textarea('job_description', $job_master_model->description, array('class' => 'form-control', $edit_session == 'edit' ? '' : 'readonly' => 'true', 'rows' => '3')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('job_status', 'Job Status', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    <?php if ($edit_session == 'view')
                    {
                        ?>
                            {{ Form::text('job_status', $job_master_model->status_name, array('class' => 'form-control', 'readonly' => 'true')) }}
                        <?php
                    }else
                    {
                        ?>
                            {{ Form::select('job_status', $job_status, $job_master_model->status_id, array('class' => 'form-control', 'id' => 'ddl_job_status')) }}
                        <?php
                    }
                    ?>
                    
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('job_expired_date', 'Expired Date', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('job_expired_date', $job_master_model->expired_date, array('class' => 'form-control', 'id' => $edit_session == 'edit' ? 'datepicker' : '' , 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('currency', 'Currency', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    <?php if ($edit_session == 'view')
                    {
                        ?>
                            {{ Form::text('currency', $job_master_model->currency_name, array('class' => 'form-control', $edit_session == 'edit' ? '' : 'readonly' => 'true')) }}
                        <?php
                    }else
                    {
                        ?>
                            {{ Form::select('currency', $currency, $job_master_model->currency_id, array('class' => 'form-control', 'id' => 'ddl_currency')) }}
                        <?php
                    }
                    ?>
                    
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('job_price', 'Job Price', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::text('job_price', $job_master_model->price_list, array('class' => 'form-control', $edit_session == 'edit' ? '' : 'readonly' => 'true')) }}
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
                    </table>
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
                    </table>
                </div>
               <?php
                    $group = session()->get('group_check');
                ?>
                    @if($group == "jc" && $edit_session != 'view')

                        {{ Form::submit('Update', array('class' => 'btn btn-outline-primary col-sm-2')) }}
                        &nbsp;&nbsp;&nbsp;&nbsp;
                        <a class="btn btn-outline-danger col-sm-2" href="{{ route('detail_job_market_delete', $item->job_id) }}">
                            Delete
                        </a>
                    @else
                        @if($group == "jf")
                            {{ Form::submit('Apply this job', array('class' => 'btn btn-outline-success col-sm-2')) }}
                        @endif
                    @endif
               
                {{ Form::close() }}
                   
                </div>
            </div>
        </div>
@stop
