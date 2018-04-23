<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Account Verification | IT Republic</title>
</head>
<body style=" margin: 0 auto;
            padding: 0 auto;
            font-family: Arial, sans-serif;">

    <div style="background-color: #fff;
    text-align: center;
    color: #333;
    padding: 5px 0;">
        <h2>IT Republic</h2>
    </div>

    <div style="margin: 30px;">
        <p><b>Hi, {{ $data['name'] }}</b></p>
        <p>
            You just make a great deal with IT Republic. 
        </p>

        <br>
        
        <p>click <a href="http://localhost/marketplace/registration/verify?email={{ $data['email'] }}&account_type={{ $data['account_type'] }}" target="_blank">VERIFY</a> to verify your account.</p>
    </div>

</body>
</html>