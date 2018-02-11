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
                {{ Form::hidden('JobID', $JobMasterModel->JobID, array('id' => 'TxtJobID')) }}
                <div class="form-group">
                    <h3>This is Job Registration (2nd Step)</h3>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobTitle', 'Job Title', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('JobTitle', $JobMasterModel->JobTitle, array('class' => 'form-control', 'readonly' => 'true')) }}
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
                {{ Form::label('JobType', 'Job Type', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8 form-group">
                        {{ Form::select('JobType', $JobType, null, array('class' => 'form-control', 'id' => 'DdlJobType')) }}
                        {{ Form::button('Add to Job Type List Below', array('id' => 'AddJobType', 'class' => 'btn btn-primary')) }}
                    </div>
                    
                </div>
                
                {{ Form::submit('Next to step 2', array('class' => 'btn btn-primary col-md-3 my-1')) }}
                {{ Form::close() }}
                   
                </div>
            </div>
        </div>
    </div>
    <script>
    $('#AddJobType').click(function(){
        
        var JobTypeChosen = $("#DdlJobType").val();
        var JobID = $('#TxtJobID').val();
        alert(JobTypeChosen);
        jQuery.post('{{ url("/jobmarketregis/addjobtype") }}', {"JobTypeID": JobTypeChosen, "JobID": JobID})
        .then(function(response){
            if(response.message == 'OK') {
                alert('New job type has been added.');
            }
            else {
                alert(response.message);
            }
        });
    });
</script>
@stop