@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')

    <div class="row" align-items-center>
        <div class="card col-md-10 offset-md-1">
            <div class="card-body">

            {{ Form::open(array('url' => 'job_market_regis/store_step_3', 'method' => 'POST')) }}
            {{ csrf_field() }}
            {{ Form::hidden('job_id', $job_master_model->job_id, array('id' => 'txt_job_id')) }}
            <div class="form-group">
                <h3>Creating Job (3rd Step)</h3>
            </div>
            <div class="form-group row">
            {{ Form::label('job_title', 'Job Title', array('class' => 'col-sm-4 col-form-label')) }}
            <div class="col-sm-8">
                {{ Form::text('job_title', $job_master_model->job_title, array('class' => 'form-control', 'readonly' => 'true')) }}
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
                {{ Form::label('skill_list', 'Skill List', array('class' => 'col-sm-4 col-form-label')) }}
                <div class="col-sm-8 form-group">
                    {{ Form::select('skill_list', $skill_type, null, array('class' => 'form-control', 'id' => 'ddl_skill_list')) }} <br>
                    {{ Form::button('Add Preferred Skill needed to List Below', array('id' => 'add_skill', 'class' => 'btn btn-outline-primary')) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('currency', 'Currency', array('class' => 'col-sm-4 col-form-label')) }}
                <div class="col-sm-8">
                {{ Form::select('currency', $currency, null, array('class' => 'form-control', 'id' => 'ddl_currency')) }}
                </div>
            </div>
            <div class="form-group row">
                {{ Form::label('job_price', 'Job Price', array('class' => 'col-sm-4 col-form-label')) }}
                <div class="col-sm-8">
                {{ Form::text('job_price', old('job_price'), array('class' => 'form-control')) }}
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
                </table>
            </div>
            
            {{ Form::submit('Submit', array('class' => 'btn btn-outline-primary col-md-3 my-1')) }}
            {{ Form::close() }}
                
            </div>
        </div>
    </div>

    <script>
    $('#add_skill').click(function(){
        
        var skill_type_chosen = $("#ddl_skill_list").val();
        var job_id = $('#txt_job_id').val();

        jQuery.post('{{ url("/job_market_regis/add_skill") }}', {"skill_type_id": skill_type_chosen, "job_id": job_id})
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