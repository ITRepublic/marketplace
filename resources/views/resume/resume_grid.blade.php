@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
    <div class="row" align-items-center>
        <div class="card col-md-10 offset-md-1">
            <div class="card-body">
                <div class="form-group">
                    <h3>{{$title}}</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>User Name</th>
                                <th>Rating</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($job_finder_model as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->username }}</td>
                                    <td>{{ $item->total_rating }}</td>
                                    <td>
                                    <?php
                                        $edit_session = session()->get('detail_resume_session');
                                        $group = session()->get('group_check');
                                        if ($group == "jc" && $edit_session == "hire")
                                        {
                                            ?>
                                                <a class="btn btn-outline-success btn-sm" href="{{ route('get_detail_applicant_job_market', [$item->finder_id, $item->job_id]) }}">
                                                    Hire
                                                </a>

                                                <a class="btn btn-outline-dark btn-sm" href="{{ route('load_chat', ['job_id' => $item->job_id, 'job_finder_id' => $item->finder_id]) }}" target="_blank">
                                                    Message
                                                </a>
                                                
                                            <?php
                                        }else
                                        {
                                            ?>
                                                <a class="btn btn-outline-dark btn-sm" href="{{ route('detail_resume', $item->finder_id) }}">
                                                    Detail
                                                </a>
                                            <?php
                                        }
                                    ?>
                                        
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@stop