<!DOCTYPE html>
<?php
 $textdir='';
 if(App::getLocale() == 'en'){
    $textdir = 'ltr';
}elseif (App::getLocale() == 'ar')
$textdir = 'rtl';
?>
 
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="<?php echo $textdir; ?>">

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
    <link rel="stylesheet" href="{{asset('public/assets/owlcarousel/dist/assets/owl.carousel.min.css')}}" />
<link rel="stylesheet" href="{{asset('public/assets/owlcarousel/dist/assets/owl.carousel.min.css')}}" />

</head>
<body>
 <div class="container m-24">
  <!-- start menu -->
    <div class="row">
        <!-- start logo -->
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="col-5">
         <div class="row">
            <div class="col-6">
            <p class="logo ">
            <img class="img-responsive" src="{{asset('/public/assets/images/NuaLogos.png')}}">
            <!-- <span class="redletter">N</span class="blackletter"><span class="yellowletter">A</span><span>U</span> GYM -->
   
            </p>
            </div>
            <div class="col-2">
            <div class="  dropdown show ">
                <?php
                $lang = '';
                if(App::getLocale() == 'en'){
                    $lang =  trans('lang.home.language.english') ;
                }elseif (App::getLocale() == 'ar')
                    $lang =  trans('lang.home.language.arabic');
                ?>
                <a class="    icone_cuscolor dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                <i class="fas fa-globe "></i> {{$lang}} </a>

                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            <a class="dropdown-item" href="{{ url('change/en') }}"  >  {{trans('lang.home.language.english')}}
                        </a>
                            <a class="dropdown-item" href="{{ url('change/ar') }}"  >  {{trans('lang.home.language.arabic')}}
                        </a>
                </div>
             </div>
            </div>
    
          </div>

        </div>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
          <!-- start Nav -->
        <div class="col-7">
                <nav class="nav menu">
                    <a class="nav-link {{Route::currentRouteName()=='home'?'active':''}} " href="{{route('home')}}"> {{trans('lang.home.menu.home')}}
                     </a>
                    <!-- <a class="nav-link" href="{{--{{route('sessions')}}--}}">Sessions</a> -->
                    <a class="nav-link {{Route::currentRouteName()=='programs'?'active':''}} " href="{{route('programs')}}">{{trans('lang.home.menu.programs')}}</a>
                        <a class="nav-link {{Route::currentRouteName()=='events'?'active':''}} " href="{{route('events')}}">{{trans('lang.home.menu.classes')}}</a>
                        <a class="nav-link {{Route::currentRouteName()=='eventsport'?'active':''}} " href="{{route('eventsport')}}">{{trans('lang.home.menu.eventsport')}}</a>
                        <a class="nav-link {{Route::currentRouteName()=='coaches'?'active':''}} " href="{{route('coaches')}}">{{trans('lang.home.menu.coaches')}}</a>
                        <a class="nav-link {{Route::currentRouteName()=='aboutus'?'active':''}} " href="{{route('aboutus')}}">{{trans('lang.home.menu.aboutus')}}</a>
                        @if(Auth::guard('members')->user())
                        <a class="nav-link  {{Route::currentRouteName()=='member.logout'?'active':''}} " href="{{route('member.logout')}}">{{trans('lang.home.menu.logout')}}</a>
                      {{--{{ Auth::guard('members')->user()->id  }}--}}
                        @else
                        <a class="nav-link  {{Route::currentRouteName()=='member.login'?'active':''}} " href="{{route('member.login')}}">{{trans('lang.home.menu.login')}}</a>

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
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
     <script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('public/assets/js/fontawesome.min.js')}}"></script>
     <script src="{{asset('public/assets/owlcarousel/dist/owl.carousel.min.js')}}"></script>
 
     <script>
$( document ).ready(function() {
    $('.owl-carousel').owlCarousel(
        {
     loop:true,
    margin:10,
    autoWidth:true,
     dots:true,
     dotsEach:3,
 
    //  center:true,
     autoplay:true,
     autoplayTimeout:3000,
     autoplayHoverPause:true,
      URLhashListener:false,
        nav:true,



    responsiveClass:true,
    responsive:{
        0:{
            items:1,
            nav:true
        },
        600:{
            items:3,
            nav:false
        },
        1000:{
            items:5,
            nav:true,
            loop:false
        }
    }
        }
    );

});



</script>
     @yield('js')

</body>

</html>
