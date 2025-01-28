<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .content{
            font-size: 1.5rem
            
        }
        .footer{
            font-size: 1rem
            
        }

    </style>
</head>
<body>
    <div class="content text-dark">
    Hello, {{$name}}! 
    <br>
    Thank you for registering. 
    <br>
    To start, visit our website <a href="{{$appURL}}" class="text-decoration-none fw-bold text-primary">here</a>.
    <br>
    Thank you!    
    </div>
    <hr class="secondary">
    <div class="footer">
    Kredo Insta
    </div>
</div>
</body>
</html>