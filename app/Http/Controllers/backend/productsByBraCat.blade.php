
@foreach($products as $products)
              <div class="col-sm-6 col-md-4 col-lg-4 mb-30">
                <div class="product pb-0">
                  <div class="product-thumb">
                  <img alt="" src="{{asset('public/storage/'.$products->image)}}"width="320" heigt="360" class="img-responsive img-fullwidth">

                  </div>
                  <div class="product-details text-center bg-lighter pt-15 pb-10">
                    <a href="#"><h5 class="product-title mt-0">{{$products->name}}</h5></a>
                  </div>
                </div>
              </div>

              @endforeach
              <div class="col-md-12">
                <nav>
                {{\App\Products::paginate(10)}}

                </nav>
              </div>
