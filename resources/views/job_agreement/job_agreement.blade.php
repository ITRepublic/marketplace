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
                    <h3>Job Agreement</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Action</th>
                                <th>Job Title</th>
                                <th>Difficulty</th>
                                <th>Total Apply</th>
                                <th>Expired Date</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($job_match_search_model as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" href="{{ route('detail_job_agreement', $item->job_id) }}">
                                            Detail
                                        </a>
                                    </td>
                                    <td>{{ $item->job_title }}</td>
                                    <td>{{ $item->diff_name }}</td>
                                    <td>{{ $item->has_seen_id }}</td>
                                    <td>{{ $item->expired_date }}</td>
                                    <td>{{ $item->status_name }}</td>
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