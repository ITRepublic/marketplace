@extends('layout.master')

@section('title')
    {{$title}}
@stop

@section('content')
    <div class="row" align-items-center>
        <div class="card col-md-10 offset-md-1">
            <div class="card-body">
                <div class="form-group">
                    <h3>Projects</h3>
                </div>
                
                <?php 
                    $group = session()->get('group_check');

                    if ($group == 'jc')
                    {
                        ?>
                            <div class="form-group row">
                                <a class="nav-link" href="{{ url('job_registration') }}">
                                    Create new job
                                </a>
                            </div>
                        <?php
                    }
                ?>               
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Job Title</th>
                                <th>Price List</th>
                                <th>Company Name</th>
                                <th>Expired Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($job_master_model as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td>{{ $item->job_title }}</td>
                                    <td>{{ number_format($item->price_list) }} ({{ $item->currency_name }}) </td>
                                    <td>{{ $item->company_name }}</td>
                                    <td>{{ $item->expired_date }}</td>
                                    <td>
                                            <?php
                                                $group = session()->get('group_check');
                                                if ($group == "admin")
                                                {
                                                    ?>
                                                        <a class="btn btn-outline-dark btn-sm" href="{{ route('detail_job_market', $item->job_id) }}">
                                                            Detail
                                                        </a>
                                                    <?php
                                                }
                                                elseif($group == "jf")
                                                {
                                                    ?>
                                                        <a class="btn btn-outline-dark btn-sm" href="{{ route('detail_job_market', $item->job_id) }}">
                                                            Detail
                                                        </a>
                                                        <a class="btn btn-outline-success btn-sm" href="{{ route('detail_job_market', $item->job_id) }}">
                                                            Apply
                                                        </a>
                                                    <?php
                                                }
                                                else
                                                {
                                                    ?>
                                                        <a class="btn btn-outline-primary btn-sm" href="{{ route('edit_detail_job_market', $item->job_id) }}">
                                                            Edit
                                                        </a>
                                                        <a class="btn btn-outline-dark btn-sm" href="{{ route('detail_job_market', $item->job_id) }}">
                                                            Detail
                                                        </a>
                                                        <a class="btn btn-outline-success btn-sm" href="{{ route('detail_applicant_job_market', $item->job_id) }}">
                                                            View Applicant
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