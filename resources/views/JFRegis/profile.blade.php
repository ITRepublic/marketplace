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
                        {{ Form::email('EmailAddress', $JobFinderModel->EmailAddress, array('class' => 'form-control', 'readonly' => 'true', 'id' => 'email')) }}
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
                    {{ Form::label('SkillList', 'Skill List', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8 form-group">
                        {{ Form::select('SkillList', $SkillType, null, array('class' => 'form-control', 'id' => 'DdlSkillList')) }}
                        {{ Form::button('Add to List', array('id' => 'AddSkill', 'class' => 'btn btn-primary')) }}
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
                                        <td>{{ $item->SkillType }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        <table>
                    </div>
                </div>
                {{ Form::submit('Submit', array('class' => 'btn btn-primary col-md-3 my-1')) }}
                {{ Form::close() }}
                   
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#AddSkill').click(function(){
            var SkillChosen = $("#DdlSkillList").val();
            var email = $('#email').val();

            jQuery.post('{{ url("/profile/skill/add") }}', {"skill": SkillChosen, "email": email})
            .then(function(response){
                if(response.message == 'OK') {
                    alert('New skill has been added.');
                }
                else {
                    alert(response.message);
                }
            });
        });
    </script>

@stop