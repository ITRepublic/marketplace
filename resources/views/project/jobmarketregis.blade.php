@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
        <div class="row" align-items-center>
            <div class="card col-md-6 offset-md-3">
                <div class="card-body">

                {{ Form::open(array('url' => 'profile/store', 'method' => 'POST')) }}
                {{ csrf_field() }}
                <div class="form-group">
                    <h3>This is Job Registration (1st Step)</h3>
                </div>
               <div class="form-group row">
                    {{ Form::label('EmailAddress', 'Email Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::email('EmailAddress', $JobCreateModel->EmailAddress, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobType', 'Job Type', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8 form-group">
                        {{ Form::select('JobType', $JobType, null, array('class' => 'form-control', 'id' => 'DdlJobType')) }}
                        {{ Form::button('Add to Job Type List Below', array('id' => 'AddJobType', 'class' => 'btn btn-primary')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('JobTypeListBox', 'Job Type List', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('JobTypeListBox', old('JobTypeListBox'), array('class' => 'form-control', 'rows' => '3')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('SkillList', 'Skill List', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8 form-group">
                        {{ Form::select('SkillList', $SkillType, null, array('class' => 'form-control', 'id' => 'DdlSkillList')) }}
                        {{ Form::button('Add Skill needed to List Below', array('id' => 'AddSkill', 'class' => 'btn btn-primary')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('SkillListListBox', 'Skill Type List', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('SkillListListBox', old('SkillListListBox'), array('class' => 'form-control', 'rows' => '3')) }}
                    </div>
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