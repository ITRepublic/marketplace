@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
        <div class="row" align-items-center>
            <div class="card col-md-6 offset-md-3">
                <div class="card-body">

                {{ Form::open(array('url' => 'jobmarketregis/storestep3', 'method' => 'POST')) }}
                {{ csrf_field() }}
                <div class="form-group">
                    <h3>This is Job Registration (1st Step)</h3>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobTitle', 'Job Title', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('JobTitle', old('JobTitle'), array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
               <div class="form-group row">
                    {{ Form::label('EmailAddress', 'Email Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::email('EmailAddress', $JobCreateModel->EmailAddress, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobDescription', 'Job Description', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('JobDescription', old('JobDescription'), array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('SkillList', 'Skill List', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8 form-group">
                        {{ Form::select('SkillList', $SkillType, null, array('class' => 'form-control', 'id' => 'DdlSkillList')) }}
                        {{ Form::button('Add Skill needed to List Below', array('id' => 'AddSkill', 'class' => 'btn btn-primary')) }}
                    </div>
                </div>
                <div class="table-responsive">
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
                                    <td>{{ $item->SkillID }}</td>
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
    $(document).ready(function() {
        
        });
    });
</script>

@stop