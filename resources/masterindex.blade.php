<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf" value="{{ csrf_token()}}">

    <title>NUA GYM</title>
    <link href="{{asset('public/assets/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{asset('public/assets/img/facveicon.png')}}" type="image/gif" sizes="32x32">
    <link href="{{asset('public/assets/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/hover-min.css')}}" rel="stylesheet" >
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.11.2/css/all.min.css" rel="stylesheet">
    <link  href="{{asset('public/assets/css/website.css')}}" rel="stylesheet"   >
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600,700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1 minimum-scale=1">
</head>

<body>
@yield('content')

    <script src="{{asset('public/assets/js/jquery-3.2.1.js')}}"></script>
    <script src="{{asset('public/assets/js/bootstrap/bootstrap.min.js')}}"></script>
 
</body>

</html>