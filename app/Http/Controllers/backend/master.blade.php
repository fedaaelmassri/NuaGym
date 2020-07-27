<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="csrf" value="{{ csrf_token()}}">

        <!-- Title Page-->
    <title>NAU GYM</title>
        <!-- Bootstrap CSS-->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet"   href="{{asset('public/assets/fontawesome-free-5.11.2-web/css/fontawesome.min.css')}}"/>
    <link rel="stylesheet"   href="{{asset('public/assets/fontawesome-free-5.11.2-web/css/all.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('public/assets/css/style.css')}}" media="screen"/>

</head>
<body>
 <div class="container m-24">
  <!-- start menu -->
    <div class="row">
        <!-- start logo -->
        <div class="col-5">
            <p class="logo">
            <img class="img-responsive" src="{{asset('/public/assets/images/nuatxt.png')}}">
            <!-- <span class="redletter">N</span class="blackletter"><span class="yellowletter">A</span><span>U</span> GYM -->
            </p>
        </div>
          <!-- start Nav -->
        <div class="col-7">
                <nav class="nav menu">
                    <a class="nav-link {{Route::currentRouteName()=='home'?'active':''}} " href="{{route('home')}}">Home</a>
                    <!-- <a class="nav-link" href="{{--{{route('sessions')}}--}}">Sessions</a> -->
                    <a class="nav-link {{Route::currentRouteName()=='programs'?'active':''}} " href="{{route('programs')}}">Programs</a>
                        <a class="nav-link {{Route::currentRouteName()=='events'?'active':''}} " href="{{route('events')}}">Events</a>
                        <a class="nav-link {{Route::currentRouteName()=='coaches'?'active':''}} " href="{{route('coaches')}}">Coaches</a>
                        <a class="nav-link {{Route::currentRouteName()=='aboutus'?'active':''}} " href="{{route('aboutus')}}">About us</a>
                        @if(Auth::guard('members')->user())
                        <a class="nav-link  {{Route::currentRouteName()=='member.logout'?'active':''}} " href="{{route('member.logout')}}">Logout</a>
                      {{--{{ Auth::guard('members')->user()->id  }}--}}
                        @else
                        <a class="nav-link  {{Route::currentRouteName()=='member.login'?'active':''}} " href="{{route('member.login')}}">Login</a>

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
      <script src="{{asset('public/assets/js/jquery-3.4.1.min.js')}}"></script>
     <script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('public/assets/js/fontawesome.min.js')}}"></script>
     @yield('js')

</body>

</html>
