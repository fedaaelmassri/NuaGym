@extends('frontend.layouts.master')
@section('style')

<style>
.fill {object-fit: fill;}
</style>
@endsection
@section('content')
<!-- Section: home -->
<section class="layer-overlay overlay-dark-4" data-bg-img="http://placehold.it/1920x1080">
    <div class="display-table">
        <div class="display-table-cell">
            <div class="container pt-200 pb-200">
                <div class="row">
                    <div class="col-md-12 text-center">
                        <h2 class="text-white text-uppercase font-54 font-weight-700 mb-0">Let's have a <span class="text-theme-colored">video</span> Tour</h2>
                        <p class="font-16 text-white">We provides always our best industrial solution for our clientsand always try to <br> achieve our client's trust and satisfaction. </p>
                        <a href="https://www.youtube.com/watch?v=LQoK8UKxftA" data-lightbox-gallery="youtube-video"><i class="fa fa-play-circle text-theme-colored font-72"></i></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="container">
        <div class="section-content">
            <div class="row">
                <div class="col-md-3">
                    <div class="icon-box text-center">
                        <a href="#" class="icon icon-gray icon-bordered bg-hover-theme-colored icon-circled icon-xl">
                            <i class="flaticon-worker text-theme-colored font-48"></i>
                        </a>
                        <h4 class="icon-box-title text-uppercase"><a class="" href="#">Expert Engineers</a></h4>
                        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias non nulla placeat, odio, qui dicta alias.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="icon-box text-center">
                        <a href="#" class="icon icon-gray icon-bordered bg-hover-theme-colored icon-circled icon-xl">
                            <i class="flaticon-tools-2 text-theme-colored font-48"></i>
                        </a>
                        <h4 class="icon-box-title text-uppercase"><a class="" href="#">Modern Tools</a></h4>
                        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias non nulla placeat, odio, qui dicta alias.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="icon-box text-center">
                        <a href="#" class="icon icon-gray icon-bordered bg-hover-theme-colored icon-circled icon-xl">
                            <i class="flaticon-wallet2 text-theme-colored font-48"></i>
                        </a>
                        <h4 class="icon-box-title text-uppercase"><a class="" href="#">Cost Effective</a></h4>
                        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias non nulla placeat, odio, qui dicta alias.</p>
                    </div>
                </div>
                <div class="col-md-3">
                    <div class="icon-box text-center">
                        <a href="#" class="icon icon-gray icon-bordered bg-hover-theme-colored icon-circled icon-xl">
                            <i class="flaticon-paintbrush text-theme-colored font-48"></i>
                        </a>
                        <h4 class="icon-box-title text-uppercase"><a class="" href="#">Creative Thinking</a></h4>
                        <p class="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Molestias non nulla placeat, odio, qui dicta alias.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Section: About -->
<section id="about">
    <div class="container-fluid pt-0 pb-0">
        <div class="row equal-height">
            <div class="col-sm-6 col-md-6 pull-right xs-pull-none bg-black-222">
                <div class="pt-90 pb-90 pl-80 pr-100 p-md-30">
                    <h2 class="title text-white line-bottom mt-0">Our Mission</h2>
                    <p class="text-gray-darkgray">High Force Engineering Solutions Ltd. is a leading supplier of industrial tools and equipment. We focus our activities to serve all industrial corporates, as well as maintenance centres in the automotive and aviation sectors. We provide clients with premium-quality industrial and engineering tools and equipment, accessories and consumables selected from the best available products globally. Our partners are well-known international household industry leaders like Stahlwille, WERA, Larzep, Yale and Gunnebo. Our product ranges includes hand tools, lifting, rigging and material handling equipment and hydraulic tools. For each product category, our partners have undergone a strict screening process and we only provide those products that we believe meet the highest standards and requirements of our clients. As such, we offer a mixed-brand tool selection across each product category.</p>

                </div>
            </div>
            <div class="col-sm-6 col-md-6 p-0 " >
                <img src="{{asset('assets/images/Aboutuspic.png')}}" style=" margin-left:32px" width="620" height="550" class="fill">
            </div>
        </div>
    </div>
</section>

<!-- Section: Sevices -->
<section>
    <div class="container">
        <div class=" section-content">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="line-bottom mt-0 mb-20">Our <span class="text-theme-colored">Service</span></h2>
                </div>
            </div>
        </div>
        <div class="section-content">
            <div class="row">
                @foreach (App\Services::take(6)->get() as $service)

                <div class="col-sm-6 col-md-4 maxwidth500 mb-40 wow fadeInLeft" data-wow-duration="1s" data-wow-delay="0.1s">
                    <img class="img-fullwidth fill" src="{{asset('storage/'.$service->image) }}"  width='540' height='300' alt="">
                    <h4 class="font-weight-700 mt-20">{{$service->name}}</h4>
                    <p>{{$service->description}}</p>
                    <a href="{{route('details' , [ 'id' => $service->id ])}}" class="btn btn-sm btn-theme-colored">Read more</a>
                </div>
                @endforeach

            </div>
        </div>
    </div>
</section>

<!-- Section Categories -->
<section id="blog">
    <div class="container pb-sm-30">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="line-bottom mt-0 mb-20">Our <span class="text-theme-colored">Categories</span></h2>
                    <div class="owl-carousel-3col">
                        @foreach (App\Categories::all() as $category)

                        <div class="item">
                            <article class="post clearfix mb-sm-30">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="{{asset('storage/'.$category->image) }}" alt="" width="540" height="300" class="fill">
                                    </div>
                                </div>
                                <div class="entry-content p-20">
                                    <h4 class="entry-title text-white text-uppercase line-bottom pb-5"><a class="font-weight-600" href="blog-single-left-sidebar.html">{{$category->name}}</a></h4>
                                    <!-- <div class="entry-meta">
                                                    <ul class="list-inline font-12 mb-10">
                                                        <li><i class="fa fa-user text-theme-colored mr-5"></i>By: Author / </li>
                                                        <li><i class="fa fa-calendar text-theme-colored mr-5"></i> June 26, 2016 </li>
                                                    </ul>
                                                </div> -->
                                    <p class="mt-5">{{$category->description}}</p>
                                    <a class="btn btn-theme-colored btn-sm mt-5" href="blog-single-left-sidebar.html"> View Details</a>
                                </div>
                            </article>
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
</section>



<!-- Section: Experts -->
<section id="experts" data-bg-img="{{asset('assets/images/photos/2.png')}}">
    <div class="container">
        <div class="section-title vertical-line">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="text-uppercase text-black title">Our <span class=" text-theme-colored">Brands</span></h2>
                </div>
            </div>
        </div>
        <div class="row mtli-row-clearfix">
            <div class="col-md-12">
                <div class="owl-carousel-4col owl-nav-top" data-nav="true">
                    @foreach (App\Brands::all() as $brand)

                    <div class="item">
                        <div class="team-members maxwidth">
                            <div class="team-thumb">
                                <img src="{{asset('storage/'.$brand->image) }}" alt="" width="370" height="275" class="fill">
                            </div>
                            <div class="team-bottom-part bg-silver-light border-bottom-theme-color-4px p-20">
                                <h4 class="line-bottom text-uppercase m-0 pb-5">{{$brand->name}}</h4>
                                <!-- <h6 class="mt-10 font-13 text-gray">Civil Engineer</h6>
                                            <ul class="styled-icons icon-sm icon-dark icon-theme-colored mt-15">
                                                <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                                                <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                                                <li><a href="#"><i class="fa fa-instagram"></i></a></li>
                                                <li><a href="#"><i class="fa fa-skype"></i></a></li>
                                            </ul> -->
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>


<!-- Section: blog -->
<section id="blog">
    <div class="container pb-sm-30">
        <div class="section-content">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="line-bottom mt-0 mb-20">Latest <span class="text-theme-colored">Blog</span></h2>
                    <div class="owl-carousel-3col">
                        @foreach (App\Posts::all() as $post)
                        <div class="item">
                            <article class="post clearfix mb-sm-30">
                                <div class="entry-header">
                                    <div class="post-thumb thumb">
                                        <img src="{{asset('storage/'.$post->image) }}" alt="" width="370" height="275" class="fill">
                                    </div>
                                </div>
                                <div class="entry-content p-20">
                                    <h4 class="entry-title text-white text-uppercase line-bottom pb-5"><a class="font-weight-600" href="{{route('post-details' , [ 'id' => $post->id ])}}">{{$post->name}}</a></h4>
                                    <!-- <div class="entry-meta">
                                                    <ul class="list-inline font-12 mb-10">
                                                        <li><i class="fa fa-user text-theme-colored mr-5"></i>By: Author / </li>
                                                        <li><i class="fa fa-calendar text-theme-colored mr-5"></i> June 26, 2016 </li>
                                                    </ul>
                                                </div> -->
                                    <p class="mt-5">{{$post->description}}</p>
                                    <a class="btn btn-theme-colored btn-sm mt-5" href="{{route('post-details' , [ 'id' => $post->id ])}}"> View Details</a>
                                </div>
                            </article>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Divider: Clients -->
<section class="clients bg-theme-colored">
    <div class="container pt-0 pb-0">
        <div class="row">
            <div class="col-md-12">
                <!-- Section: Clients -->
                <div class="owl-carousel-6col clients-logo transparent text-center">
                    @foreach (App\Brands::all() as $brand)

                    <div class="item">
                        <a href="{{route('brand-details', [ 'id' => $brand->id ])}}"><img src="{{asset('storage/'.$brand->image) }}" width="200" height="120" class="fill" alt=""></a>
                    </div>
                    @endforeach

                </div>
            </div>
        </div>
    </div>
</section>

@endsection
