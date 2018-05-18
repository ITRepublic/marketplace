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
                {{ Form::hidden('job_id', $job_master_model->job_id, array('id' => 'txt_job_id')) }}
                <div class="form-group">
                    <h3>{{ $job_master_model->job_title }}</h3>
                </div>
                <?php
                    $group = session()->get('group_check');
                    $detail_job_agreement_session = session()->get('detail_job_agreement_session');
                    $can_edit = 'true';
                    if ($group == 'jf' || $detail_job_agreement_session =='view' )
                    {
                        $can_edit = 'false';
                    }
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
                <!-- <div class="form-group row">
                    {{ Form::label('job_status', 'Job Status', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::select('job_status', $job_status, null, array('class' => 'form-control', 'id' => 'ddl_job_status', $group != 'admin' ? '' : 'disabled' => 'true')) }}
                    </div>
                </div> -->
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
                                <th>Email</th>
                                <th>User Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($job_applicant_model as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->email_address }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->status_name }}</td>                                
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
                <div class="form-group">
                
                    <h3>Payment Type {{ $job_agreement_status->payment_type_name}}</h3>
                </div>
                <?php  
                $counter = 1;
                $total_milestone_price = 0;
                    if (! empty($job_master_detail_milestone_model)) 
                    {
                        foreach ($job_master_detail_milestone_model as $item)
                        {
                            $status_detail = $item->status_id;
                        ?>                   
                            <div id="TextBoxesGroup" class="milestonediv">
                                <div id="milestone_detail" class="form-group row">
                                    {{ Form::label('milestone_detail', 'Milestone Detail #'.$counter, array('class' => 'col-sm-2 col-form-label')) }}
                                    <div class="form-inline col-sm-10">
                                        {{ Form::text('milestone_detail_'.$counter, $item->milestone_detail, array('class' => 'form-control col-sm-7', 'readonly' => 'true')) }}
                                            &nbsp;&nbsp;Price:&nbsp;&nbsp;
                                        {{ Form::text('milestone_price_'.$counter, number_format($item->milestone_price), array('class' => 'form-control col-sm-2 milestone_price_list numeric', 'readonly' => 'true', 'id' => 'milestone_price_'.$counter)) }}
                                        &nbsp;&nbsp;&nbsp;<?php 
                                                        if ($status_detail == '3' && $group == 'jf'){
                                                            ?>
                                                            <a class="btn btn-success btn-sm" href="{{ route('update_status_job_agreement_finish', [$item->job_detail_id, $item->job_id]) }}">
                                                                Finish the task
                                                            </a>
                                                            <?php
                                                        }else if ($status_detail == '4' && $group == 'jc')
                                                        {
                                                            ?>
                                                            <a class="btn btn-success btn-sm" href="{{ route('update_status_job_agreement_review', [$item->job_detail_id, $item->job_id]) }}">
                                                                Pay and review
                                                            </a>                                                                
                                                            <?php
                                                            
                                                        }else
                                                        {
                                                            ?>
                                                            <a class="btn btn-success btn-sm" style="display:none;" href="{{ route('update_status_job_agreement_review', [$item->job_detail_id, $item->job_id]) }}">
                                                                Reviewed
                                                            </a>                                                                
                                                            <?php
                                                        }
                                                    ?>
                                                    <?php if($status_detail == '5')
                                                        {
                                                            ?>
                                                                Done
                                                            <?php
                                                        }
                                                    ?>
                                        
                                    </div>
                                </div>
                            </div>
                            
                        <?php
                        $total_milestone_price = $total_milestone_price+$item->milestone_price;
                        $counter++;
                        }     
                        ?>
                        <div class="form-group row milestonediv">
                    {{ Form::label('total_milestone_price', 'Total Full Price', array('class' => 'col-sm-3 col-form-label', 'id' => 'total_milestone_price')) }}
                        <div class="form-inline col-sm-7">
                            {{ Form::label('total_milestone_price_label', number_format($total_milestone_price), array('class' => 'col-sm-5 col-form-label', 'id' => 'total_milestone_price_label')) }}
                        </div>                 
                </div>
                        <?php                   
                    }else
                    {
                        ?>
                            <div class="form-group row milestonediv">
                    {{ Form::label('total_milestone_price', 'Total Milestone Price', array('class' => 'col-sm-3 col-form-label', 'id' => 'total_milestone_price')) }}
                        <div class="form-inline col-sm-7">
                            {{ Form::label('total_milestone_price_label', number_format($job_master_model->price_list), array('class' => 'col-sm-5 col-form-label', 'id' => 'total_milestone_price_label')) }}
                        </div>                 
                </div>
                        <?php
                    }
                ?>
                
                <?php
                    if ($group != "admin")
                    {
                        ?>
                            @if($job_master_model->job_status == 6 && $group == 'jf')
                            {{ Form::submit('Accept the terms', array('class' => 'btn btn-outline-primary col-md-3 my-1', $detail_job_agreement_session == 'edit' ? '' : 'style="display:none"')) }}
                            @elseif($job_master_model->job_status == 3 && $group == 'jf' && $job_agreement_status->payment_type_name == 'Full')
                            {{ Form::submit('Request payment', array('class' => 'btn btn-outline-primary col-md-3 my-1', $detail_job_agreement_session == 'edit' ? '' : 'style="display:none"')) }}
                            @elseif($job_master_model->job_status == 4 && $job_master_model->payment_type_id == 1 && 
                                $group == 'jc')
                                <div class="form-group rating">
                                    <input type="hidden" id="php1_hidden" value="1">
                                    <img src="{{ asset('public/image/star2.png') }}" style="width:50px; height:50px;" onmouseover="change(this.id);" id="php1" class="php">
                                    <input type="hidden" id="php2_hidden" value="2">
                                    <img src="{{ asset('public/image/star2.png') }}" style="width:50px; height:50px;" onmouseover="change(this.id);" id="php2" class="php">
                                    <input type="hidden" id="php3_hidden" value="3">
                                    <img src="{{ asset('public/image/star2.png') }}" style="width:50px; height:50px;" onmouseover="change(this.id);" id="php3" class="php">
                                    <input type="hidden" id="php4_hidden" value="4">
                                    <img src="{{ asset('public/image/star2.png') }}" style="width:50px; height:50px;" onmouseover="change(this.id);" id="php4" class="php">
                                    <input type="hidden" id="php5_hidden" value="5">
                                    <img src="{{ asset('public/image/star2.png') }}" style="width:50px; height:50px;" onmouseover="change(this.id);" id="php5" class="php">
                                    {{ Form::hidden('total_score_rating', "0", array('id' => 'total_rating')) }}
                                </div>
                            {{ Form::submit('Pay and end contract', array('class' => 'btn btn-outline-primary col-md-3 my-1', $detail_job_agreement_session == 'edit' ? '' : 'style="display:none"')) }}
                            @elseif($job_master_model->job_status == 3 && $job_master_model->payment_type_id == 2 && 
                                $group == 'jc')
                                <div class="form-group rating">
                                    <input type="hidden" id="php1_hidden" value="1">
                                    <img src="{{ asset('public/image/star2.png') }}" style="width:50px; height:50px;" onmouseover="change(this.id);" id="php1" class="php">
                                    <input type="hidden" id="php2_hidden" value="2">
                                    <img src="{{ asset('public/image/star2.png') }}" style="width:50px; height:50px;" onmouseover="change(this.id);" id="php2" class="php">
                                    <input type="hidden" id="php3_hidden" value="3">
                                    <img src="{{ asset('public/image/star2.png') }}" style="width:50px; height:50px;" onmouseover="change(this.id);" id="php3" class="php">
                                    <input type="hidden" id="php4_hidden" value="4">
                                    <img src="{{ asset('public/image/star2.png') }}" style="width:50px; height:50px;" onmouseover="change(this.id);" id="php4" class="php">
                                    <input type="hidden" id="php5_hidden" value="5">
                                    <img src="{{ asset('public/image/star2.png') }}" style="width:50px; height:50px;" onmouseover="change(this.id);" id="php5" class="php">
                                    {{ Form::hidden('total_score_rating', "0", array('id' => 'total_rating')) }}
                                </div>
                            {{ Form::submit('End contract', array('class' => 'btn btn-outline-primary col-md-3 my-1', $detail_job_agreement_session == 'edit' ? '' : 'style="display:none"')) }}
                            @endif
                        <?php
                    }
                ?>
                 
                {{ Form::close() }}
            </div>
        </div>
    </div>
</div>
<script>
        

         function change(id)
   {
      var cname=document.getElementById(id).className;
      var ab=document.getElementById(id+"_hidden").value;
      document.getElementById("total_rating").innerHTML=ab;
      document.getElementById("total_rating").value=ab;
      for(var i=ab;i>=1;i--)
      {
         document.getElementById(cname+i).src="{{ asset('public/image/star1.png') }}";
      }
      var id=parseInt(ab)+1;
      for(var j=id;j<=5;j++)
      {
         document.getElementById(cname+j).src="{{ asset('public/image/star2.png') }}";
      }
   }
    </script>
@stop