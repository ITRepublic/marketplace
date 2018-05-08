<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="_token" content="{!! csrf_token() !!}" /> 
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Marketplace :: IT Republic</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Lato">
    <link rel="stylesheet" href="{{ asset('public/css/common.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/navbar.css') }}">
    <link rel="stylesheet" href="{{ asset('public/css/footer.css') }}">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js" crossorigin="anonymous"></script>    
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.3/umd/popper.min.js" integrity="sha384-vFJXuSJphROIrBnz7yo7oB41mKfc8JzQZiCq4NCceLEaO4IHwicKwpJf9c9IpFgh" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/js/bootstrap.min.js" integrity="sha384-alpBpkh1PFOepccYVYDB4do5UnbKysX5WZXm3XxPqe5iKTfUKjNkCk9SaVuEZflJ" crossorigin="anonymous"></script>
    <script src="http://malsup.github.com/jquery.form.js"></script>
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
    <script>
        setTimeout(function(){
           window.location.reload(1);
        }, 30000);
    </script>
</head>
<body>
    
    <div class="content-wrapper">
        <nav class="navbar fixed-bottom navbar-light bg-light">
          <form class="form-inline" action="{{ route('send_chat', ['job_id' => $job_id, 'finder_id' => $finder_id]) }}" method="POST">
            {{ csrf_field() }}
            <textarea name="message" class="form-control mr-sm-3" cols="140" rows="2" style="resize: none" required></textarea>
            <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Send</button>
          </form>
        </nav>
        <div class="container-fluid my-3 col-md-8" style="padding-bottom: 80px;">
            @foreach($chats as $chat)
                <div class="card my-1" @if($user_id == $chat->sender_id) style="text-align:right;" @else style="text-align: left;" @endif>
                  <div class="card-body">
                    <h5 class="card-title">{{ $user[$chat->id] }}</h5>
                    <h6 class="card-subtitle mb-2 text-muted">{{ $chat->created_at->diffForHumans() }}</h6>
                    {{ strip_tags($chat->message) }}
                  </div>
                </div>
            @endforeach
        </div>
    </div>
</body>
</html>
