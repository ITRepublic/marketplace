@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
    <div class="row" align-items-center>
        <div class="card col-md-10 offset-md-1">
            <div class="card-body">

                {{ Form::hidden('finder_id', $job_finder_model->finder_id, array('id' => 'txt_finder_id')) }}
                <?php $edit_session = session()->get('detail_resume_session'); ?> 
                <div class="form-group">
                    <h3>{{ $job_finder_model->username }}</h3>
                </div>
                
                <div class="form-group row">
                    {{ Form::label('username', 'User Name', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('username',  $job_finder_model->username , array('class' => 'form-control', $edit_session == 'edit' ? '' : 'readonly' => 'true')) }}
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
                        {{ Form::textarea('address', $job_finder_model->address, array('class' => 'form-control', $edit_session == 'edit' ? '' : 'readonly' => 'true', 'rows' => '3')) }}
                    </div>
                </div>
                <div class="form-group row">
                {{ Form::label('phone', 'Phone', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('phone', $job_finder_model->phone, array('class' => 'form-control', $edit_session == 'edit' ? '' : 'readonly' => 'true')) }}
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
                            @foreach($skill_list as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->skill_type }}</td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div> 
            </div>
        </div>
    </div>
@stop