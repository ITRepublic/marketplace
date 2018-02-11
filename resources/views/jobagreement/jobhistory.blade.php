@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
<div class="container-fluid">
    <div class="row" align-items-center>
        <div class="card col-md-10 offset-md-1">
            <div class="card-body">
                <div class="form-group">
                    <h3>This is Job Agreement History</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Action</th>
                                <th>Job Title</th>
                                <th>User Name</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($JobHistoryModel as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><a class="btn btn-danger col-md-5 my-1" href="{{ url('jobhistory/jobhistorydetail') }}">
                                            <i class="fa fa-user pr-1"></i>Detail
                                        </a>
                                    </td>
                                    <td>{{ $item->JobTitle }}</td>
                                    <td>{{ $item->UserName }}</td>
                                    <td>Active</td>
                                </tr>
                            @endforeach
                        </tbody>
                    <table>
                </div>
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