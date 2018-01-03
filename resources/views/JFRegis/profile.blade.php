@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
        <div class="row" align-items-center>
            <div class="card col-md-6 offset-md-3">
                <div class="card-body">

                {{ Form::open(array('url' => 'jobFinder/update', 'method' => 'POST')) }}
                <div class="form-group">
                    <h3>Job Finder Profile</h3>
                </div>
                <div class="form-group row">
                    {{ Form::label('UserName', 'User Name', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('UserName',  $JobFinderModel->UserName , array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('EmailAddress', 'Email Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::email('EmailAddress', $JobFinderModel->EmailAddress, array('class' => 'form-control', 'readonly' => 'true')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('Address', 'Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('Address', $JobFinderModel->Address, array('class' => 'form-control', 'rows' => '3')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('Phone', 'Phone', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('Phone', $JobFinderModel->Phone, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('Phone', 'Skill List', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8 form-group">
                        {{ Form::select('SkillList', $SkillType, null, array('class' => 'form-control')) }}
                        {{ Form::button('Add to List', array('id' => 'AddSkill', 'class' => 'btn btn-primary')) }}
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
        var url = "http://localhost/marketplace/public/"
        $('#AddSkill').click(function(){
            alert('test');
        var SkillChosen = $(SkillList).val();
            alert(SkillChosen);
        // $.ajax({
        //     data:"";
        //     type: "POST",
        //     url: url + '/' + task_id,
        //     success: function (data) {
        //         console.log(data);

        //         $("#task" + task_id).remove();
        //     },
        //     error: function (data) {
        //         console.log('Error:', data);
        //     }
        // });
        });
    });
</script>

@stop