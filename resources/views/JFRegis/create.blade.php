<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Register :: IT Republic</title>
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
        <div class="row" align-items-center>
            <div class="card col-md-6 offset-md-3">
                <div class="card-body">
				
				{{-- display error messages --}}
                @if($errors->any())
                	@foreach($errors->all() as $error)
                		<div class="alert alert-danger">{{ $error }}</div>
                	@endforeach
                @endif
				
				{{-- display success message --}}
                @if(session()->has('success'))
                	<div class="alert alert-success">{{ session('success') }}</div>
                @endif

                {{ Form::open(array('url' => 'registerjobfinder/store', 'method' => 'POST')) }}
                <div class="form-group">
                    {{ Form::label('UserName', 'User Name') }}
                    {{ Form::text('UserName', old('UserName'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Password', 'Password') }}
                    {{ Form::password('Password', array('id' => 'Password', 'class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Email', 'Email Address') }}
                    {{ Form::email('Email', old('Email'), array('class' => 'form-control')) }}
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    {{ Form::label('Address', 'Address') }}
                    {{ Form::textarea('Address', old('Address'), array('class' => 'form-control')) }}
                </div>
                <div class="form-group">
                    {{ Form::label('Phone', 'Phone') }}
                    {{ Form::text('Phone', old('Phone'), array('class' => 'form-control')) }}
                </div>

                {{ Form::submit('Submit', array('class' => 'btn btn-primary')) }}

                {{ Form::close() }}
                   
                </div>
            </div>
        </div>
    </div>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    </body>
</html>
