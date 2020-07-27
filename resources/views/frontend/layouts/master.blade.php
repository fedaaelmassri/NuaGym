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
    <title>NAU</title>
        <!-- Bootstrap CSS-->
    <link href="{{asset('public/assets/css/bootstrap.min.css')}}" rel="stylesheet" media="all">
    <link rel="stylesheet"   href="{{asset('public/assets/fontawesome-free-5.11.2-web/css/fontawesome.min.css')}}"/>
    <link rel="stylesheet"   href="{{asset('public/assets/fontawesome-free-5.11.2-web/css/all.min.css')}}"/>
    <link rel="stylesheet"  href="{{asset('public/assets/css/styleDM.css')}}" media="screen"/>
    <link rel="stylesheet" href="{{asset('public/assets/owlcarousel/dist/assets/owl.carousel.min.css')}}" />
    <link rel="stylesheet" href="{{asset('public/assets/swiper/package/css/swiper.min.css')}}">


 <style>
 </style>

</head>
<body>
 <div class="container ">
  <!-- start menu -->
         <!-- start logo -->
        <nav class="navbar navbar-expand-lg navbar-light ">
        <a class="logo " href= "{{route('home')}}">
            <img class="img-responsive" src="{{asset('/public/assets/images/NuaLogos.png')}}">
            <!-- <span class="redletter">N</span class="blackletter"><span class="yellowletter">A</span><span>U</span> GYM -->
   
            </a>
  <div class="  dropdown show ">
                <?php
                $lang = '';
                if(App::getLocale() == 'en'){
                    $lang =  trans('lang.home.language.english') ;
                }elseif (App::getLocale() == 'ar')
                    $lang =  trans('lang.home.language.arabic');
                ?>
                                        @if(App::getLocale() == 'en')

                <a class="icone_cuscolor dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                 <img class="img-responsive" src="{{asset('/public/assets/images/uk.png')}}">&nbsp;  {{$lang}} 
                              
                         
                 </a>
                 @endif
                 @if(App::getLocale() == 'ar')

                    <a class="icone_cuscolor dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                 <img class="img-responsive" src="{{asset('/public/assets/images/kw.png')}}">&nbsp;  {{$lang}} 
                                  
                           
                    </a>
                    
                    @endif


                    <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">

                            <a class="dropdown-item" href="{{ url('change/en') }}"  >  <img class="img-responsive" src="{{asset('/public/assets/images/uk.png')}}">&nbsp;&nbsp;{{trans('lang.home.language.english')}}
                            </a>
                           <a class="dropdown-item" href="{{ url('change/ar') }}"  >  <img class="img-responsive" src="{{asset('/public/assets/images/kw.png')}}">&nbsp;&nbsp;{{trans('lang.home.language.arabic')}}
                           </a>
                </div>
             </div>
            
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">

    <ul class="navbar-nav    mright-auto">
      <!-- <li class="nav-item  ">
      <a class="nav-link {{Route::currentRouteName()=='home'?'active':''}} " href="{{route('home')}}"> {{trans('lang.home.menu.home')}}
                     </a> -->

        <!-- <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a> -->
      <!-- </li> -->
      @if((Route::currentRouteName()=='programs')||(Route::currentRouteName()=='events')||(Route::currentRouteName()=='coaches'))

      <li class="nav-item">
      <a class="nav-link {{Route::currentRouteName()=='coaches'?'active':''}} " href="{{route('coaches')}}">{{trans('lang.home.menu.coaches')}}</a>
      </li>

      <li class="nav-item dropdown">
      <a class="nav-link {{Route::currentRouteName()=='events'?'active':''}} " href="{{route('events')}}">{{trans('lang.home.menu.classes')}}</a>
      </li>
      
      <li class="nav-item">
      <a class="nav-link {{Route::currentRouteName()=='programs'?'active':''}} " href="{{route('programs')}}">{{trans('lang.home.menu.programs')}}</a>
      </li>

      @endif
      @if(Route::currentRouteName()=='eventsport')
      <li class="nav-item">
      <a class="nav-link {{Route::currentRouteName()=='eventsport'?'active':''}} " href="{{route('eventsport')}}">{{trans('lang.home.menu.eventsport')}}</a>
      </li>
      @endif
      @if(Route::currentRouteName()=='aboutus')

      <li class="nav-item">
      <a class="nav-link {{Route::currentRouteName()=='aboutus'?'active':''}} " href="{{route('aboutus')}}">{{trans('lang.home.menu.aboutus')}}</a>
      </li>
      @endif
      {{--@if((Route::currentRouteName()=='programs')||(Route::currentRouteName()=='events')||(Route::currentRouteName()=='coaches')||(Route::currentRouteName()=='eventsport'))
--}}
      <!-- <li class="nav-item">
      @if(Auth::guard('members')->user())
                        <a class="nav-link  {{Route::currentRouteName()=='member.logout'?'active':''}} " href="{{route('member.logout')}}">{{trans('lang.home.menu.logout')}}</a>
                      {{--{{ Auth::guard('members')->user()->id  }}--}}
                        @else
                        <a class="nav-link  {{Route::currentRouteName()=='member.login'?'active':''}} " href="{{route('member.login')}}">{{trans('lang.home.menu.login')}}</a>

                        @endif
                              </li> -->
{{--                              @endif
--}}
    </ul>
   
  </div>
</nav>
</div>
<div>
</div>
         <!-----End menu------>

    <!-----start body ------>
<!--------- Start section1-->
<div class="container ">
 <div class="  col-xs-12  d-lg-none  d-md-block ">

@if(Route::currentRouteName()=='programs')
 <h2  class="page-title"  >{{trans('lang.home.menu.programs')}}</h2>
 @endif
@if(Route::currentRouteName()=='coaches')

<!-- <span class="  col-xs-12  d-lg-none  d-md-block ">
    Programs
    </span> -->
 <h2 class="page-title" >{{trans('lang.home.menu.coaches')}}</h2>
 @endif
@if(Route::currentRouteName()=='events')

 <h2  class="page-title" >{{trans('lang.home.menu.classes')}}</h2>
 


@endif
@if(Route::currentRouteName()=='eventsport')
<h2  class="page-title" >{{trans('lang.home.menu.eventsport')}}</h2>

      @endif
</div>
@yield('content')

</div>
     <!-- end body  -->

      <!-- Bootstrap JS-->
      <script src="{{asset('public/assets/js/jquery-3.4.1.min.js')}}"></script>
      <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
     <script src="{{asset('public/assets/js/bootstrap.min.js')}}"></script>
     <script src="{{asset('public/assets/js/fontawesome.min.js')}}"></script>
     <script src="{{asset('public/assets/owlcarousel/dist/owl.carousel.min.js')}}"></script>
     <script src="{{asset('public/assets/swiper/package/js/swiper.min.js')}}"></script>

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
            items:1,
            nav:false,
            loop:true

        
        },
        1000:{
            items:1,
            nav:true,
            loop:true
        }
    }
        }
    );

});



     var swiper = new Swiper('.swiper-container', {
        // mode: 'horizontal',
        // centeredSlides: true,
        slidesPerView: 1,
      spaceBetween: 10,
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      breakpoints: {
        640: {
          slidesPerView: 1,
          spaceBetween: 10,
          navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

        },
        768: {
          slidesPerView: 2,
          spaceBetween: 20,
          navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },

        },
        1024: {
             slidesPerView: 3,
            // slidesPerView: 'auto'
            spaceBetween: 5,
            navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },


        },
      }
    });
  </script>
     @yield('js')

</body>

</html>
