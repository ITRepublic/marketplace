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
                    <h3>This is Resume</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Email</th>
                                <th>User Name</th>
                                <th>Rating</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($JobFinderModel as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->EmailAddress }}</td>
                                    <td>{{ $item->UserName }}</td>
                                    <td>4</td>
                                    <td>
                                        <a class="btn btn-danger btn-sm" href="{{ route('detailResume', $item->finderid) }}">
                                            Detail
                                        </a>
                                    </td>
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