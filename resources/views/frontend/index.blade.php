<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>NUA</title>
    <link href="{{asset('public/assets/css/bootstrap/bootstrap.min.css')}}" rel="stylesheet" type="text/css">
    <link rel="icon" href="{{asset('public/assets/img/facveicon.png')}}" type="image/gif" sizes="32x32">
    <link href="{{asset('public/assets/css/animate.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/assets/css/hover-min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{asset('public/assets/css/website.css')}}">
    <link href="https://fonts.googleapis.com/css?family=IBM+Plex+Sans:400,600,700&display=swap" rel="stylesheet">
    <meta name="viewport" content="width=device-width, initial-scale=1 minimum-scale=1">
</head>

<body>
    <div class="container-fluid full-height">
        <div class="row full-height">
            <div class="col-sm-12 text-center full-width full-height BG-Dark">

            <div class="Content animated">
                    <div class="pull-right img_circle img_circle-top  hvr-icon-wobble-vertical">
                        <h3 class="prog_1 "></h3>
                        <a href="https://float.nuakw.com/">
                            <img class="img-responsive hvr-icon   " src="{{asset('public/assets/img/Circle-Bold.png')}}" alt="">
                        </a>
                        <h3 class="prog_1"></h3>
                    </div>
                    <div class="pull-left img_circle img_circle-top hvr-icon-wobble-vertical">
                        <h3 class="prog_2 "></h3>
                        <a href="{{route('coaches')}}">
                            <img class="img-responsive hvr-icon  " src="{{asset('public/assets/img/Circle-Sold-top.png')}}" alt="">
                        </a>
                        <h3 class="prog_2 "></h3>
                    </div>
                    <div class="clearfix"></div>
                    <div> <img class="img-responsive"
                            style=" cursor: auto; box-shadow: 0px -1px 10px rgba(0, 0, 0, 0.2);" src="{{asset('public/assets/img/line.png')}}"
                            alt=""> </div>
                    <div class="hvr-icon-wobble-vertical img_circle img_circle-btm">
                        <h3 class="prog_3 "></h3>
                        <a href="{{route('eventsport')}}">
                            <img class="img-responsive  hvr-icon " src="{{asset('public/assets/img/Circle-Sold-btm.png')}}">
                        </a>
                        <h3 class="prog_3 "></h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <a href="{{route('aboutus')}}" class="logo  animated hvr-float-shadow">
                    <div class="img_circle-ctr">
                        <img class="img-responsive " src="{{asset('public/assets/img/NUA-Logo.png')}}" />
                    </div>

                </a>
            </div>
            <div class="clearfix"></div>
            <div class="Social animated" dir="rtl">
            
                <!-- <a  href=" {{App\Settings::where('constant','facebook')->first('value')->value}}" class="hvr-grow">
                    <i class="fab fa-facebook "></i>
                </a> -->
                <a href=" {{App\Settings::where('constant','instagram')->first('value')->value}}" class="hvr-grow">
                <i class="lab la-instagram"></i>
                </a>
                <a href="tel:{{App\Settings::where('constant','telephone')->first('value')->value}}" class="hvr-grow">
                <i class="las la-phone"></i>
                </a>
                   <a  href="https://api.whatsapp.com/send?phone={{App\Settings::where('constant','whatsapp')->first('value')->value}}" class="hvr-grow">
                   <i class="lab la-whatsapp"></i>
                </a>
                <a href="{{App\Settings::where('constant','location')->first('value')->value}}" class="hvr-grow" target="_blank">
                <i class="las la-map-marker"></i>
                </a>
        </div>
        </div>
    </div>
   
    <script src="{{asset('public/assets/js/jquery-3.2.1.js')}}"></script>
    <!-- <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script> -->

    <script src="{{asset('public/assets/js/bootstrap/bootstrap.min.js')}}"></script>
  
</body>


</html>