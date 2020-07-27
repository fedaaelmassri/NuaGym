<!DOCTYPE html>
<html lang="en">
<head>
        <!-- Required meta tags-->
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <!-- Title Page-->
    <title>Document</title>
        <!-- Bootstrap CSS-->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet"   href="{{asset('assets/fontawesome-free-5.11.2-web/css/fontawesome.min.css')}}"/>
    <link rel="stylesheet"   href="{{(asset'assets/fontawesome-free-5.11.2-web/css/all.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('assets/css/style.css')}}" media="screen"/>

</head>
<body>
 <div class="container m-24">
  <!-- start menu -->
    <div class="row">
        <!-- start logo -->
        <div class="col-6">
            <p class="logo">
            <span class="redletter">N</span class="blackletter"><span class="yellowletter">A</span><span>U</span> GYM
            </p>
        </div>
          <!-- start Nav -->
        <div class="col-6">
                <nav class="nav menu">
                    <a class="nav-link active " href="index.html">Home</a>
                    <a class="nav-link" href="sessions.html">Sessions</a>
                    <a class="nav-link" href="programs.html">Programs</a>
                        <a class="nav-link" href="events.html">Events</a>
                        <a class="nav-link" href="coaches.html">Coaches</a>
                        <a class="nav-link" href="aboutus.html">About us</a>
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
