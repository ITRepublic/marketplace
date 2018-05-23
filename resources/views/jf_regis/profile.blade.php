@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
        <div class="row" align-items-center>
            <div class="card col-md-10 offset-md-1">
                <div class="card-body">

                {{ Form::open(array('url' => 'profile/store','files' => true, 'method' => 'POST')) }}
                {{ csrf_field() }}
                <div class="form-group">
                    <h3>My Profile</h3>
                </div>
                <div class="form-group row">
                    {{ Form::label('username', 'Username', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('username',  $job_finder_model->username , array('class' => 'form-control')) }}
                    </div>
                </div>

                <div class="form-group row">
                    {{ Form::label('email_address', 'Email Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::email('email_address', $job_finder_model->email_address, array('class' => 'form-control', 'readonly' => 'true', 'id' => 'email')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('address', 'Address', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::textarea('address', $job_finder_model->address, array('class' => 'form-control', 'rows' => '3')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('phone', 'Phone', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('phone', $job_finder_model->phone, array('class' => 'form-control')) }}
                    </div>
                </div>
                <div class="form-group row">
                    {{ Form::label('skill_list', 'Skill List', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8 form-group">
                        {{ Form::select('skill_list', $skill_type, null, array('class' => 'form-control', 'id' => 'ddl_skill_list')) }} <br>
                        {{ Form::button('Add to List', array('id' => 'add_skill', 'class' => 'btn btn-outline-primary')) }}
                    </div>
                    
                </div>
                <div class="form-group row">
                    {{ Form::label('profile_pict', 'Profile pict', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8 form-group">
                    {{Form::file('profile_pict')}}
                    </div>
                </div>
                    <div class="table-responsive">
                        <h3>Skill Lists</h3>
                        <table class="table table-bordered table-condensed">
                            <thead>
                                <tr>
                                    <th>No.</th>
                                    <th>Skill Name</th>
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
                
                {{ Form::submit('Update', array('class' => 'btn btn-outline-primary col-md-3 my-1')) }}
                {{ Form::close() }}
                   
                </div>
            </div>
        </div>
    </div>
    <script>
        $('#add_skill').click(function(){
            var skill_chosen = $("#ddl_skill_list").val();
            var email = $('#email').val();

            jQuery.post('{{ url("/profile/skill/add") }}', {"skill": skill_chosen, "email": email})
            .then(function(response){
                if(response.message == 'OK') {
                    alert('New skill has been added.');
                    window.location.reload();
                }
                else {
                    alert(response.message);
                }
            });
        });
    </script>

@stop