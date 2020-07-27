@extends('layouts.masterindex')
@section('content')
 <div class="container-fluid full-height">
        <div class="row full-height">
            <div class="col-sm-12 text-center full-width full-height BG-Blue">

                <h3 class="Content animated">
                    <div class="pull-right img_circle img_circle-top  hvr-icon-wobble-vertical">
                        <div class="">
                        <!-- <h4 class="pull-right   ">سبا</h4>
                        <h4 class="pull-left   ">Spa</h4> -->
                    </div>
                        <h3 class="prog_1 "></h3>
                        <a href="#">
                            <img class="img-responsive hvr-icon   " src="{{asset('public/assets/img/Circle-Bold.png')}}" alt="">
                        </a>
                        <h3 class="prog_1"></h3>

                    </div>
                    <div class="pull-left img_circle img_circle-top hvr-icon-wobble-vertical">
                        <h3 class="prog_2 "></h3>
                        <a href="#">
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
                        <a href="#">
                            <img class="img-responsive  hvr-icon " src="{{asset('public/assets/img/Circle-Sold-btm.png')}}">
                        </a>
                        <h3 class="prog_3 "></h3>
                    </div>
                </div>
                <div class="clearfix"></div>
                <a href="#" class="logo  animated hvr-float-shadow">
                    <div class="img_circle-ctr">
                        <img class="img-responsive " src="{{asset('public/assets/img/NUA-Logo.png')}}" />
                    </div>

                </a>
            </div>
            <div class="clearfix"></div>
            <div class="Social animated" dir="rtl">
            
                <a href="#" class="hvr-grow">
                    <i class="fab fa-facebook "></i>
                </a>
                <a href="#" class="hvr-grow">
                    <i class="fab fa-instagram"></i>
                </a>
                <a href="#" class="hvr-grow">
                    <i class="fas fa-phone-alt"></i>
                </a>
                <a href="https://goo.gl/maps/RH72qo6xxUoBGqwV9" class="hvr-grow" target="_blank">
                    <i class="fas fa-map-marker-alt"></i>
                </a>
        </div>
        </div>
    </div>
@endsection
