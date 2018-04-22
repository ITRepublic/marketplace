@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')

    <div class="row" align-items-center>
        <div class="card col-md-10 offset-md-1">
            <div class="card-body">

            {{ Form::open(array('url' => 'job_market_regis/store_step_2', 'method' => 'POST')) }}
            {{ csrf_field() }}
            {{ Form::hidden('job_id', $job_master_model->job_id, array('id' => 'txt_job_id')) }}
            <div class="form-group">
                <h3>Creating Job (2nd Step)</h3>
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
            {{ Form::label('job_type', 'Job Type', array('class' => 'col-sm-4 col-form-label')) }}
                <div class="col-sm-8 form-group">
                    {{ Form::select('job_type', $job_type, null, array('class' => 'form-control', 'id' => 'ddl_job_type')) }} <br>
                    {{ Form::button('Add to Job Type List Below', array('id' => 'add_job_type', 'class' => 'btn btn-outline-primary')) }}
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
                        @foreach($job_match_type_model as $index => $item)
                            <tr>
                                <td>{{ $index + 1 }}</td>
                                <td>{{ $item->job_type_desc }}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            {{ Form::submit('Next to step 3', array('class' => 'btn btn-outline-primary col-md-3 my-1')) }}
            {{ Form::close() }}
                
            </div>
        </div>
    </div>

    <script>
    $('#add_job_type').click(function(){
        
        var job_type_chosen = $("#ddl_job_type").val();
        var job_id = $('#txt_job_id').val();

        jQuery.post('{{ url("/job_market_regis/add_job_type") }}', {"job_type_id": job_type_chosen, "job_id": job_id})
        .then(function(response){
            if(response.message == 'OK') {
                alert('New job type has been added.');
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