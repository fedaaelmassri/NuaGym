<!DOCTYPE html>

<html dir="ltr" lang="en">

<head>

    <!-- Meta Tags -->
    <meta name="viewport" content="width=device-width,initial-scale=1.0" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8" />
    <meta name="description" content="Industrypress - Factory & Industrial Business Template" />
    <meta name="keywords" content="building,business,construction,cleaning,transport,workshop" />
    <meta name="author" content="ThemeMascot" />

    <!-- Page Title -->
    <title>High Force</title>

    <!-- Favicon and Touch Icons -->
    <link href="{{asset('assets/images/favicon.png')}}" rel="shortcut icon" type="image/png">
    <link href="{{asset('assets/images/apple-touch-icon.png')}}" rel="apple-touch-icon">
    <link href="{{asset('assets/images/apple-touch-icon-72x72.png')}}" rel="apple-touch-icon" sizes="72x72">
    <link href="{{asset('assets/images/apple-touch-icon-114x114.png')}}" rel="apple-touch-icon" sizes="114x114">
    <link href="{{asset('assets/images/apple-touch-icon-144x144.png')}}" rel="apple-touch-icon" sizes="144x144">

    <!-- Stylesheet -->
    <link href="{{asset('assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/jquery-ui.min.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/animate.css')}}" rel="stylesheet" type="text/css">
    <link href="{{asset('assets/css/css-plugin-collections.css')}}" rel="stylesheet" />
    <!-- CSS | menuzord megamenu skins -->
    <link id="menuzord-menu-skins" href="{{asset('assets/css/menuzord-skins/menuzord-rounded-boxed.css')}}" rel="stylesheet" />
    <!-- CSS | Main style file -->
    <link href="{{asset('assets/css/style-main.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Preloader Styles -->
    <link href="{{asset('assets/css/preloader.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Custom Margin Padding Collection -->
    <link href="{{asset('assets/css/custom-bootstrap-margin-padding.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Responsive media queries -->
    <link href="{{asset('assets/css/responsive.css')}}" rel="stylesheet" type="text/css">
    <!-- CSS | Style css. This is the file where you can place your own custom css code. Just uncomment it and use it. -->
    <!-- <link href="css/style.css" rel="stylesheet" type="text/css"> -->

    <!-- CSS | Theme Color -->
    <link href="{{asset('assets/css/colors/theme-skin-green.css')}}" rel="stylesheet" type="text/css">

    <!-- external javascripts -->
    <script src="{{asset('assets/js/jquery-2.2.4.min.js')}}"></script>
    <script src="{{asset('assets/js/jquery-ui.min.js')}}"></script>
    <script src="{{asset('assets/js/bootstrap.min.js')}}"></script>
    <!-- JS | jquery plugin collection for this theme -->
    <script src="{{asset('assets/js/jquery-plugin-collection.js')}}"></script>
    <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">
    <script src='https://www.google.com/recaptcha/api.js'></script>


    @yield('style')

    <style>

.fixed-plugin {
  position: fixed;
  right: 0;
  width: 64px;
  background: rgba(0, 0, 0, 0.3);
  z-index: 1031;
  border-radius: 8px 0 0 8px;
  text-align: center;
  top: 120px;
}

.fixed-plugin li>a,
.fixed-plugin .badge {
  transition: all .34s;
  -webkit-transition: all .34s;
  -moz-transition: all .34s;
}

.fixed-plugin .fa-cog {
  color: #FFFFFF;
  padding: 10px;
  border-radius: 0 0 6px 6px;
  width: auto;
}

.fixed-plugin .dropdown-menu {
  right: 80px;
  left: auto !important;
  top: -52px !important;
  width: 290px;
  border-radius: 0.1875rem;
  padding: 0 10px;
  background: linear-gradient(#222a42, #1d253b);
}

.fixed-plugin .dropdown .dropdown-menu .tim-icons {
  top: 5px;
}

.fixed-plugin .dropdown-menu:after,
.fixed-plugin .dropdown-menu:before {
  right: 10px;
  margin-left: auto;
  left: auto;
}

.fixed-plugin .fa-circle-thin {
  color: #FFFFFF;
}

.fixed-plugin .active .fa-circle-thin {
  color: #00bbff;
}

.fixed-plugin .dropdown-menu>.active>a,
.fixed-plugin .dropdown-menu>.active>a:hover,
.fixed-plugin .dropdown-menu>.active>a:focus {
  color: #777777;
  text-align: center;
}

.fixed-plugin img {
  border-radius: 0;
  width: 100%;
  height: 100px;
  margin: 0 auto;
}

.fixed-plugin .dropdown-menu li>a:hover,
.fixed-plugin .dropdown-menu li>a:focus {
  box-shadow: none;
}

.fixed-plugin .badge {
  border: 2px solid #FFFFFF;
  border-radius: 50%;
  cursor: pointer;
  display: inline-block;
  height: 23px;
  margin-right: 5px;
  position: relative;
  width: 23px;
}

.fixed-plugin .badge.active,
.fixed-plugin .badge:hover {
  border-color: #1d253b;
}

.fixed-plugin .badge-primary {
  background-color: #e14eca;
}

.fixed-plugin .badge-blue {
  background-color: #1d8cf8;
}

.fixed-plugin .badge-green {
  background-color: #00f2c3;
}

.fixed-plugin .badge-orange {
  background-color: #ff8d72;
}

.fixed-plugin .badge-red {
  background-color: #fd5d93;
}

.fixed-plugin .light-badge,
.fixed-plugin .dark-badge {
  margin: 0;
  border: 1px solid #1d8cf8;
}

.fixed-plugin .light-badge:hover,
.fixed-plugin .dark-badge:hover {
  border: 1px solid #1d8cf8;
}

.fixed-plugin .light-badge {
  background: #FFFFFF;
}

.fixed-plugin .light-badge:hover {
  background: #FFFFFF;
}

.fixed-plugin .dark-badge {
  background: #222a42;
}

.fixed-plugin .dark-badge:hover {
  background: #222a42;
}

.fixed-plugin h5 {
  font-size: 14px;
  margin: 10px;
}

.fixed-plugin .dropdown-menu li {
  display: block;
  padding: 18px 2px;
  width: 25%;
  float: left;
}

.fixed-plugin li.adjustments-line,
.fixed-plugin li.header-title,
.fixed-plugin li.button-container {
  width: 100%;
  height: 50px;
  min-height: inherit;
}

.fixed-plugin li.button-container {
  height: auto;
}

.fixed-plugin li.button-container div {
  margin-bottom: 5px;
}

.fixed-plugin #sharrreTitle {
  text-align: center;
  padding: 10px 0;
  height: 50px;
}

.fixed-plugin li.header-title {
  color: #FFFFFF;
  height: 30px;
  line-height: 25px;
  font-size: 12px;
  font-weight: 600;
  text-align: center;
  text-transform: uppercase;
}

.fixed-plugin .adjustments-line p {
  float: left;
  display: inline-block;
  margin-bottom: 0;
  font-size: 1em;
  color: #3C4858;
}

.fixed-plugin .adjustments-line a {
  color: transparent;
}

.fixed-plugin .adjustments-line a .badge-colors {
  position: relative;
  top: -2px;
}

.fixed-plugin .adjustments-line a a:hover,
.fixed-plugin .adjustments-line a a:focus {
  color: transparent;
}

.fixed-plugin .adjustments-line .togglebutton {
  text-align: center;
}

.fixed-plugin .adjustments-line .togglebutton .label-switch {
  position: relative;
  left: -10px;
  font-size: 0.7142em;
  color: #FFFFFF;
}

.fixed-plugin .adjustments-line .togglebutton .label-switch.label-right {
  left: 10px;
}

.fixed-plugin .adjustments-line .togglebutton .toggle {
  margin-right: 0;
}

.fixed-plugin .adjustments-line .color-label {
  position: relative;
  top: -7px;
  font-size: 0.7142em;
  color: #FFFFFF;
}

.fixed-plugin .adjustments-line .dropdown-menu>li.adjustments-line>a {
  padding-right: 0;
  padding-left: 0;
  border-bottom: 1px solid #ddd;
  border-radius: 0;
  margin: 0;
}

.fixed-plugin .dropdown-menu>li>a.img-holder {
  font-size: 16px;
  text-align: center;
  border-radius: 10px;
  background-color: #FFF;
  border: 3px solid #FFF;
  padding-left: 0;
  padding-right: 0;
  opacity: 1;
  cursor: pointer;
  display: block;
  max-height: 100px;
  overflow: hidden;
  padding: 0;
}

.fixed-plugin .dropdown-menu>li>a.img-holder img {
  margin-top: auto;
}

.fixed-plugin .dropdown-menu>li a.switch-trigger:hover,
.fixed-plugin .dropdown-menu>li>a.switch-trigger:focus {
  background-color: transparent;
}

.fixed-plugin .dropdown-menu>li:hover>a.img-holder,
.fixed-plugin .dropdown-menu>li:focus>a.img-holder {
  border-color: rgba(0, 187, 255, 0.53);
}

.fixed-plugin .dropdown-menu>.active>a.img-holder,
.fixed-plugin .dropdown-menu>.active>a.img-holder {
  border-color: #00bbff;
  background-color: #FFFFFF;
}

.fixed-plugin .btn-social {
  width: 50%;
  display: block;
  width: 48%;
  float: left;
  font-weight: 600;
}

.fixed-plugin .btn-social i {
  margin-right: 5px;
}

.fixed-plugin .btn-social:first-child {
  margin-right: 2%;
}

.fixed-plugin .dropdown .dropdown-menu {
  -webkit-transform: translateY(-15%);
  -moz-transform: translateY(-15%);
  -o-transform: translateY(-15%);
  -ms-transform: translateY(-15%);
  transform: translateY(-15%);
  top: 27px;
  opacity: 0;
  transform-origin: 0 0;
}

.fixed-plugin .dropdown .dropdown-menu:before {
  border-bottom: 0.4em solid rgba(0, 0, 0, 0);
  border-left: 0.4em solid rgba(0, 0, 0, 0.2);
  border-top: 0.4em solid rgba(0, 0, 0, 0);
  right: -16px;
  top: 46px;
}

.fixed-plugin .dropdown .dropdown-menu:after {
  border-bottom: 0.4em solid rgba(0, 0, 0, 0);
  border-left: 0.4em solid #222a42;
  border-top: 0.4em solid rgba(0, 0, 0, 0);
  right: -16px;
}

.fixed-plugin .dropdown .dropdown-menu:before,
.fixed-plugin .dropdown .dropdown-menu:after {
  content: "";
  display: inline-block;
  position: absolute;
  top: 74px;
  width: 16px;
  transform: translateY(-50%);
  -webkit-transform: translateY(-50%);
  -moz-transform: translateY(-50%);
}

.fixed-plugin .dropdown.show .dropdown-menu {
  opacity: 1;
  -webkit-transform: translateY(-13%);
  -moz-transform: translateY(-13%);
  -o-transform: translateY(-13%);
  -ms-transform: translateY(-13%);
  transform: translateY(-13%);
  transform-origin: 0 0;
}

.fixed-plugin .bootstrap-switch {
  margin: 0;
}

    .list-inline{
display:none;


    }
    #customies {
        width: 23% !important;
      display: block;
      margin-block-end: 2px;

    /* clear: both;

    border: 0 none ;
    font-size: 12px ;
    position: relative; */
}



    </style>
    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<body class="">
    <div id="wrapper" class="clearfix">
        <!-- preloader -->
        <div id="preloader">
            <div id="spinner">
                <img class="ml-5" src="{{asset('assets/images/preloaders/3.gif')}}" alt="">
            </div>
            <div id="disable-preloader" class="btn btn-default btn-sm">Disable Preloader</div>
        </div>

        <!-- Header -->
        <header id="header" class="header">
            <div class="header-top bg-black-333 sm-text-center border-top-theme-color-3px p-0">
                <div class="container">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="widget no-border m-0">
                                <ul class="list-inline xs-text-center text-white mt-5">
                                    <li class="m-0 pl-10 pr-10"> <a href="#" class="text-white"><i class="fa fa-phone text-theme-colored"></i> 123-456-789</a> </li>
                                    <li class="m-0 pl-10 pr-10">
                                        <a href="#" class="text-white"><i class="fa fa-envelope-o text-theme-colored"></i> contact@yourdomain.com</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3 pr-0">
                            <div class="widget no-border m-0">
                                <ul class="styled-icons icon-dark icon-flat icon-sm pull-right flip sm-pull-none sm-text-center mt-sm-15">
                                    <li><a href="#"><i class="fa fa-facebook text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-twitter text-white"></i></a></li>
                                    <!-- <li><a href="#"><i class="fa fa-google-plus text-white"></i></a></li>
                                    <li><a href="#"><i class="fa fa-instagram text-white"></i></a></li> -->
                                    <li><a href="#"><i class="fa fa-linkedin text-white"></i></a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <a class="btn btn-colored btn-flat btn-theme-colored  pb-10" href="{{route('ecatalog')}}">E-Catalog</a>

                            <a class="btn btn-colored btn-flat btn-theme-colored bs-modal-ajax-load pb-10" data-toggle="modal" data-target="#BSParentModal" href="ajax-load/reservation-form.html">Get A Quote Now</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="header-nav">
                <div class="header-nav-wrapper navbar-scrolltofixed bg-white">
                    <div class="container">
                        <nav id="menuzord-right" class="menuzord default">
                            <a class="menuzord-brand pull-left flip xs-pull-center mt-20" href="{{route('home')}}">
                                <img src="{{asset('assets/images/HF _logo _435x68-01.png')}}" alt="">
                            </a>
                            <ul class="menuzord-menu">
                                <li class="active"><a href="{{route('home')}}">Home</a>

                                </li>
                                <li><a href="#">Services</a>
                                    <ul class="dropdown">
                                        <?php

                                        $services = App\Services::get();
                                        ?>

                                        @foreach($services as $servic)
                                        <li><a href="{{route('details', [ 'id' => $servic->id ])}}">{{$servic->name}}</a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="#">Products </a>
                                </li>
                                </li>
                                <!-- <li><a href="{{route('brands')}}">Brands</a>

                                </li> -->


                                <li><a href="{{route('brands')}}">Brands</a>
                                    <ul class="dropdown list-inline " id="customies">
                                        <?php

                                        $brands = App\Brands::get();
                                        ?>

                                        @foreach($brands as $brand)
                                        <li><a href="">{{$brand->name}} -
                                        <img alt="" width="20" height="10" src="{{asset('storage/'.$brand->image) }}">
                                            </a></li>
                                        @endforeach
                                    </ul>
                                </li>
                                <li><a href="{{route('news')}}">News</a>

                                </li>
                                <li><a href="{{route('blog')}}">Blog</a>

                                </li>
                                <li><a href="{{route('about')}}">About us</a>

                                </li>
                                <li><a href="{{route('contactUs')}}">Contact us</a>

                                </li>

                            </ul>
                        </nav>
                    </div>
                </div>
            </div>
        </header>

        <!-- Start main-content -->
        <div class="main-content">
            @yield('content')
        </div>
        <!-- end main-content -->

        <!-- Footer -->
        <footer id="footer" class="footer" data-bg-img="{{asset('assets/images/footer-bg.png')}}" data-bg-color="#001018">
            <div class="container pt-70 pb-40">
                <div class="row border-bottom-black">
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <img class="mt-10 mb-20" alt="" src="{{asset('assets\media\logos\logo-footer.png')}}">
                            <p>203, Envato Labs, Behind Alis Steet, Melbourne, Australia.</p>
                            <ul class="list-inline mt-5">
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-phone text-theme-colored mr-5"></i> <a class="text-gray" href="https://wa.me/+96264203026">+962 6 420 3026</a> </li>
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-envelope-o text-theme-colored mr-5"></i> <a class="text-gray" href="mailto:info@hiforcejo.com"> info@hiforcejo.com</a> </li>
                                <li class="m-0 pl-10 pr-10"> <i class="fa fa-globe text-theme-colored mr-5"></i> <a class="text-gray" href="#">www.yourdomain.com</a> </li>
                            </ul>
                            <ul class="social-icons icon-bordered icon-circled icon-sm mt-15">
                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                <li><a href="#"><i class="fa fa-youtube"></i></a></li>
                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                <li><a href="#"><i class="fa fa-pinterest"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h5 class="widget-title line-bottom">Latest News</h5>
                            <div class="latest-posts">
                                @foreach (App\News::orderBy('created_at', 'desc')->take(3)->get() as $new)

                                <article class="post media-post clearfix pb-0 mb-10">
                                    <a href="{{route('new-details' , [ 'id' => $new->id ])}}" class="post-thumb"><img alt="" width="80" height="55" src="{{asset('storage/'.$new->image) }}"></a>
                                    <div class="post-right">
                                        <h5 class="post-title mt-0 mb-5"><a href="{{route('new-details' , [ 'id' => $new->id ])}}">{{$new->name}}</a></h5>
                                        <p class="post-date mb-0 font-12">{{$new->created_at}}</p>
                                    </div>
                                </article>
                                @endforeach
                                <!-- <article class="post media-post clearfix pb-0 mb-10">
                                    <a href="#" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                                    <div class="post-right">
                                        <h5 class="post-title mt-0 mb-5"><a href="#">Industrial Coatings</a></h5>
                                        <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                                    </div>
                                </article>
                                <article class="post media-post clearfix pb-0 mb-10">
                                    <a href="#" class="post-thumb"><img alt="" src="http://placehold.it/80x55"></a>
                                    <div class="post-right">
                                        <h5 class="post-title mt-0 mb-5"><a href="#">Storefront Installations</a></h5>
                                        <p class="post-date mb-0 font-12">Mar 08, 2015</p>
                                    </div>
                                </article> -->
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h5 class="widget-title line-bottom">Useful Links</h5>
                            <ul class="list angle-double-right list-border">
                                <li><a href="{{route('home')}}">Home</a></li>
                                <li><a href="{{route('about')}}">About</a></li>
                                <li><a href="{{route('news')}}">Latest News</a></li>
                                <li><a href="{{route('blog')}}">Blog</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-6 col-md-3">
                        <div class="widget dark">
                            <h5 class="widget-title line-bottom">Quick Contact</h5>
                            <form id="footer_quick_contact_form" name="footer_quick_contact_form" class="quick-contact-form" action="{{route('sendEmail.QuickContactus')}}" method="post">
                                @csrf
                                <div class="form-group">
                                    <input id="email" name="email" class="form-control email" type="email" required="" placeholder="Enter Email">
                                </div>
                                <div class="form-group">
                                    <textarea id="message" name="message" class="form-control" required="" placeholder="Enter Message" rows="3"></textarea>
                                </div>
                                <div class="form-group">
                                    <input id="form_botcheck" name="form_botcheck" class="form-control" type="hidden" value="" />
                                    <button type="submit" class="btn btn-default btn-transparent btn-xs btn-flat mt-0" data-loading-text="Please wait...">Send Message</button>
                                </div>
                            </form>

                            <!-- Quick Contact Form Validation-->

                        </div>
                    </div>
                </div>
            </div>
            <div class="footer-bottom" data-bg-color="#001111">
                <div class="container pt-15 pb-10">
                    <div class="row">
                        <div class="col-md-12">
                            <p class="font-12 text-gray m-0 text-center">Copyright &copy;2019 <span class="text-theme-colored">ThemeMascot</span>. All Rights Reserved</p>
                        </div>
                    </div>
                </div>
            </div>
        </footer>
        <a class="scrollToTop" href="#"><i class="fa fa-angle-up"></i></a>
    </div>
    <!-- end wrapper -->
    <div class="fixed-plugin">
      <div class="dropdown show-dropdown">
        <a href="#" data-toggle="dropdown">
          <i class="fa fa-cog fa-2x"> </i>
        </a>
        <ul class="dropdown-menu">
          <li class="header-title"> Sidebar Background</li>
          <li class="adjustments-line">
            <a href="javascript:void(0)" class="switch-trigger background-color">
              <div class="badge-colors text-center">
                <span class="badge filter badge-primary active" data-color="primary"></span>
                <span class="badge filter badge-blue" data-color="blue"></span>
                <span class="badge filter badge-green" data-color="green"></span>
              </div>
              <div class="clearfix"></div>
            </a>
          </li>
          <li class="adjustments-line text-center color-change">
            <span class="color-label">LIGHT MODE</span>
            <span class="badge light-badge mr-2"></span>
            <span class="badge dark-badge ml-2"></span>
            <span class="color-label">DARK MODE</span>
          </li>
          <li class="button-container">
            <a href="https://www.creative-tim.com/product/black-dashboard" target="_blank" class="btn btn-primary btn-block btn-round">Download Now</a>
            <a href="https://demos.creative-tim.com/black-dashboard/docs/1.0/getting-started/introduction.html" target="_blank" class="btn btn-default btn-block btn-round">
              Documentation
            </a>
          </li>
          <li class="header-title">Thank you for 95 shares!</li>
          <li class="button-container text-center">
            <button id="twitter" class="btn btn-round btn-info"><i class="fab fa-twitter"></i> &middot; 45</button>
            <button id="facebook" class="btn btn-round btn-info"><i class="fab fa-facebook-f"></i> &middot; 50</button>
            <br>
            <br>
            <a class="github-button" href="https://github.com/creativetimofficial/black-dashboard" data-icon="octicon-star" data-size="large" data-show-count="true" aria-label="Star ntkme/github-buttons on GitHub">Star</a>
          </li>
        </ul>
      </div>
    </div>
    <!-- Footer Scripts -->
    <!-- JS | Custom script for all pages -->
    <script src="{{asset('assets/js/custom.js')}}"></script>
    <script src="{{ asset('assets/app/bundle/app.bundle.js')}}" type="text/javascript"></script>

    <script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>
    <script>
           $(document).ready(function() {
        $().ready(function() {


            fixed_plugin_open = $('.wrapper .main-content .nav li.active a p').html();




          $('.fixed-plugin a').click(function(event) {
            // Alex if we click on switch, stop propagation of the event, so the dropdown will not be hide, otherwise we set the  section active
            if ($(this).hasClass('switch-trigger')) {
              if (event.stopPropagation) {
                event.stopPropagation();
              } else if (window.event) {
                window.event.cancelBubble = true;
              }
            }
          });

        }); });
        @if(session('message'))

        var type = "{{session('alert-type')}}"
        switch (type) {
            case 'success':
                toastr.success("{{ session('message') }}");
                break;
            case 'error':
                toastr.error("{{ session('message') }}");
                break;
        }

        @endif
    </script>


    @yield('js')

</body>

</html>
