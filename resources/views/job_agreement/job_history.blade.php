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
                    <h3>Projects History</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Job Title</th>
                                <th>Company Name</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($job_history_model as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->job_title }}</td>
                                    <td>{{ $item->company_name }}</td>
                                    <td>{{ $item->status_name }}</td>
                                    <td>
                                        <a class="btn btn-outline-dark btn-sm col-md-5 my-1" href="{{ route('job_history_detail', $item->job_id) }}">
                                            Detail
                                        </a>
                                        <a class="btn btn-outline-success btn-sm col-md-5 my-1" href="{{ route('load_chat', ['job_id' => $item->job_id, 'job_finder_id' => session('user_id')]) }}" target="_blank">
                                            Message
                                        </a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@stop