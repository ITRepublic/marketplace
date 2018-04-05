@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
    <div class="row" align-items-center>
        <div class="card col-md-10 offset-md-1">
            <div class="card-body">

                {{ Form::hidden('FinderID', $JobFinderModel->finderid, array('id' => 'TxtFinderID')) }}
                <?php $editsession = session()->get('detailresumesession'); ?> 
                <div class="form-group">
                    <h3>{{ $JobFinderModel->UserName }}</h3>
                </div>
                
                <div class="form-group row">
                    {{ Form::label('UserName', 'User Name', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('UserName',  $JobFinderModel->UserName , array('class' => 'form-control', $editsession == 'edit' ? '' : 'readonly' => 'true')) }}
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
                        {{ Form::textarea('Address', $JobFinderModel->Address, array('class' => 'form-control', $editsession == 'edit' ? '' : 'readonly' => 'true', 'rows' => '3')) }}
                    </div>
                </div>
                <div class="form-group row">
                {{ Form::label('Phone', 'Phone', array('class' => 'col-sm-4 col-form-label')) }}
                    <div class="col-sm-8">
                        {{ Form::text('Phone', $JobFinderModel->Phone, array('class' => 'form-control', $editsession == 'edit' ? '' : 'readonly' => 'true')) }}
                    </div>
                </div>
                <!-- <div class="form-group row">
                {{ Form::label('SkillList', 'Skill List', array('class' => 'col-sm-4 col-form-label')) }}
                <div class="col-sm-8 form-group">
                    {{ Form::select('SkillList', $SkillType, null, array('class' => 'form-control', 'id' => 'DdlSkillList', 'disabled' => 'true')) }}
                    {{ Form::button('Add to List', array('id' => 'AddSkill', $editsession == 'edit' ? '' : 'disabled' => 'true', 'class' => 'btn btn-primary')) }}
                </div> -->

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
        </div>
    </div>
</div>
@stop