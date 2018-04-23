@extends('layout.master')

@section('content')
<div class="card text-center">
    <div class="card-header">
        <h3>VERIFICATION SUCCESS</h3>
    </div>
    <div class="card-body">
        <h4>
            Congratulations! Your account is active now.
        </h4>
        <br>
        <p>
            You just make a great deal by becoming part of IT Republic.
        </p>
        <br>
        
        <div>
            <a href="{{ url('/login') }}" class="btn btn-danger col-md-4 col-md-offset-4 col-xs-12 btn-lg no-border-radius">GETTING STARTED</a>
        </div>
    </div>
</div>
@endsection