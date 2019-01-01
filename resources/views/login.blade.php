<!DOCTYPE html>
<html>

<head>

    <meta charset="UTF-8">

    <title>SISGO - Login </title>
    <link rel="shortcut icon" type="image/x-icon" href="{{url('favicon.ico')}}" />
    <link rel="stylesheet" href="{{url('css/reset.css')}}">

    <link rel="stylesheet" href="{{url('css/style.css')}}" media="screen" type="text/css" />

</head>

<body>

    <div class="wrap">
        <div class="avatar">
            <img src="{{url('image/logo.png')}}">
        </div>
        <form role="form" method="POST" action="{{ route('login') }}">
            {{ csrf_field() }}
            <input name="username" type="text" placeholder="username" required>
            <div class="bar">
                <i></i>
            </div>
            <input name="password" type="password" placeholder="password" required>
            <a href="" class="forgot_link">forgot ?</a>
            <button type="submit">Sign in</button>
        </form>
    </div>

    <script src="js/index.js"></script>

</body>

</html>
