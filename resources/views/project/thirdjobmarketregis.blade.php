@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
        <div class="row" align-items-center>
            <div class="card col-md-10 offset-md-1">
                <div class="card-body">

                {{ Form::open(array('url' => 'jobmarketregis/storestep3', 'method' => 'POST')) }}
                {{ csrf_field() }}
                {{ Form::hidden('JobID', $JobMasterModel->JobID, array('id' => 'TxtJobID')) }}
                <div class="form-group">
                    <h3>Creating Job (3rd Step)</h3>
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
                    {{ Form::label('JobStatus', 'Job Status', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::select('JobStatus', $JobStatus, null, array('class' => 'form-control', 'id' => 'DdlJobStatus')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('Currency', 'Currency', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::select('Currency', $Currency, null, array('class' => 'form-control', 'id' => 'DdlCurrency')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobPrice', 'Job Price', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                    {{ Form::text('JobPrice', old('JobPrice'), array('class' => 'form-control')) }}
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
                <div class="form-group row">
                    {{ Form::label('SkillList', 'Skill List', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8 form-group">
                        {{ Form::select('SkillList', $SkillType, null, array('class' => 'form-control', 'id' => 'DdlSkillList')) }}
                        {{ Form::button('Add Preferred Skill needed to List Below', array('id' => 'AddSkill', 'class' => 'btn btn-primary')) }}
                    </div>
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
               
                {{ Form::submit('Submit', array('class' => 'btn btn-primary col-md-3 my-1')) }}
                {{ Form::close() }}
                   
                </div>
            </div>
        </div>
    </div>
    <script>
    $('#AddSkill').click(function(){
        
        var SkillTypeChosen = $("#DdlSkillList").val();
        var JobID = $('#TxtJobID').val();

        jQuery.post('{{ url("/jobmarketregis/addskill") }}', {"SkillTypeID": SkillTypeChosen, "JobID": JobID})
        .then(function(response){
            if(response.message == 'OK') {
                alert('New skill type has been added.');
                window.location.reload();
            }
            else {
                alert(response.message);
                window.location.reload();
            }
        });
    });
</script>

@stop