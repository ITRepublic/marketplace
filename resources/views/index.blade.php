@extends('layout.master')

@section('content')
    <img class="img-fluid" src="{{ asset('public/image/slider1.png') }}" alt="">

    <div class="row py-3 text-center" style="background-color: #fff;">
        <div class="col-md-3">
            <img src="http://via.placeholder.com/350x150" class="img-fluid" alt="...">
            <h4>Feature 1</h4>
            <p>This is feature 1</p>
        </div>
        <div class="col-md-3">
            <img src="http://via.placeholder.com/350x150" class="img-fluid" alt="...">
            <h4>Feature 2</h4>
            <p>This is feature 2</p>
        </div>
        <div class="col-md-3">
            <img src="http://via.placeholder.com/350x150" class="img-fluid" alt="...">
            <h4>Feature 3</h4>
            <p>This is feature 3</p>
        </div>
        <div class="col-md-3">
            <img src="http://via.placeholder.com/350x150" class="img-fluid" alt="...">
            <h4>Feature 4</h4>
            <p>This is feature 4</p>
        </div>
    </div>
@endsection