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
                    <h3>Search for Jobs</h3>
                </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-condensed">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Action</th>
                                <th>Job Title</th>
                                <th>Price List</th>
                                <th>Company Name</th>
                                <th>Difficulty</th>
                                <th>Expired Date</th>
                            </tr>
                        </thead>
                        <tbody>
                        @foreach($JobMasterModel as $index => $item)
                                <tr>
                                    <td>{{ $index + 1 }}</td>
                                    <td><a class="btn btn-danger col-md-10" href="{{ url('project/jobmarketdetail') }}">
                                            <i class="fa fa-user pr-1"></i>Detail
                                        </a>
                                    </td>
                                    <td>{{ $item->JobTitle }}</td>
                                    <td>({{ $item->CurrencyName }}) {{ $item->PriceList }}</td>
                                    <td>{{ $item->CompanyName }}</td>
                                    <td>{{ $item->DiffName }}</td>
                                    <td>{{ $item->ExpiredDate }}</td>
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