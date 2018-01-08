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
                    <h3>This is Job Market Place</h3>
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