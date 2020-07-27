<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf" value="{{ csrf_token()}}">

        <!-- Title Page-->
    <title>Document</title>
        <!-- Bootstrap CSS-->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet"   href="{{asset('assets/fontawesome-free-5.11.2-web/css/fontawesome.min.css')}}"/>
    <link rel="stylesheet"   href="{{asset('assets/fontawesome-free-5.11.2-web/css/all.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('assets/css/style.css')}}" media="screen"/>

</head>
<body>
 <div class="container m-24">
  <!-- start menu -->
    <div class="row">
        <!-- start logo -->
        <div class="col-5">
            <p class="logo">
            <span class="redletter">N</span class="blackletter"><span class="yellowletter">A</span><span>U</span> GYM
            </p>
        </div>
          <!-- start Nav -->
        <div class="col-7">
                <nav class="nav menu">
                    <a class="nav-link active " href="{{route('home')}}">Home</a>
                    <a class="nav-link" href="{{route('sessions')}}">Sessions</a>
                    <a class="nav-link" href="{{route('programs')}}">Programs</a>
                        <a class="nav-link" href="{{route('events')}}">Events</a>
                        <a class="nav-link" href="{{route('coaches')}}">Coaches</a>
                        <a class="nav-link" href="{{route('aboutus')}}">About us</a>
                        @if(Auth::guard('members')->check())
                        <a class="nav-link  " href="{{route('member.logout')}}">Logout</a>
                      {{--{{ Auth::guard('members')->user()->name }}--}}
                        @else
                        <a class="nav-link  " href="{{route('member.login')}}">Login</a>

                        @endif

                 </nav>
            </div>
    </div>
        <!-----End menu------>

    <!-----start body ------>
<!--------- Start section1-->
@yield('content')


     <!-- end body  -->

      <!-- Bootstrap JS-->
      <script src="{{asset('assets/js/jquery-3.4.1.min.js')}}"></script>
     <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('assets/js/fontawesome.min.js')}}"></script>
</body>

</html>
