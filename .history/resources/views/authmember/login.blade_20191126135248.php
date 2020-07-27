<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Colorlib Templates">
    <meta name="author" content="Colorlib">
    <meta name="keywords" content="Colorlib Templates">

    <!-- Title Page-->
    <title>NAU GYM Register  </title>

    <!-- Icons font CSS-->
    <link href="{{asset('assets/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('assets/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <!-- Font special for pages-->
    <link href="{{asset('assets/https://fonts.googleapis.com/css?family=Poppins:100,100i,200,200i,300,300i,400,400i,500,500i,600,600i,700,700i,800,800i,900,900i')}}" rel="stylesheet">

    <!-- Vendor CSS-->
    <link href="{{asset('assets/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('assets/vendor/datepicker/daterangepicker.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->


    <link href="{{asset('assets/css/main.css')}}" rel="stylesheet" media="all">
    <script src="{{ asset('js/app.js') }}" defer></script>

<!-- Fonts -->
<link rel="dns-prefetch" href="//fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

<!-- Styles -->
<style>



/*
start navbar style
*/



.topnav {
  overflow: hidden;
  background-color: #fbfbfb;
}
.topnav .brand{

float: left;
  color: #000000;
  text-align: left;
  text-decoration: none;
  display: inline-block;
    padding-top: .32rem;
    padding-bottom: .32rem;
    margin-right: 1rem;
    font-size: 1.125rem;
    line-height: inherit;
    white-space: nowrap;

}
.topnav a {
  float: right;
   color: rgba(0,0,0,.5) !important;
  text-align: left;
  padding: 14px 16px;
  text-decoration: none;
  font-size: 17px;
  background-color: transparent;
    -webkit-text-decoration-skip: objects;

}

.topnav a:hover {
    color: rgba(0,0,0,.9);
 }


 /* end navbarstyle */


</style>
</head>

<body>


<div class="topnav">
  <a class="active"  href="{{ route('member.registration') }}">{{ __('Register') }}</a>
  <a href="{{ route('login') }}">{{ __('Login') }}</a>
   <div class="brand">
  <a href="{{ route('home') }}">
  Home

                  </a>  </div>
</div>


    <div class="page-wrapper bg-gra-02 p-t-130 p-b-100 font-poppins">
        <div class="wrapper wrapper--w680">
            <div class="card card-4">
                <div class="card-body">
                    <h2 class="title">Login</h2>
                    <form method="POST" action="{{ route('member.post-login') }}">
                        @csrf

                        <div class="input-group">
                            <label for="email" class="  label">{{ __('E-Mail Address') }}</label>
                             <input id="email" type="email" class="input--style-4  @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                            @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror

                        </div>
                        <div class="input-group">
                            <label for="email" class="  label">{{ __('Password') }}</label>

                             <input id="password" type="password" class="input--style-4  @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror

                        </div>

                        <div class="row row-space">
                            <div class="col-2">
                                <div class="input-group">
                                    <label class="label">    {{ __('Remember Me') }}</label>
                                    <div class="input-group-icon" style="margin-top: -22px;">
                                         <input class="  form-check-input " type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
                                     </div>
                                </div>
                            </div>

                        </div>



                        <div class="p-t-15">
                            <button class="btn btn--radius-2 btn--blue" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <!-- Jquery JS-->
    <script src="{{asset('assets/vendor/jquery/jquery.min.js')}}"></script>
    <!-- Vendor JS-->
    <script src="{{asset('assets/vendor/select2/select2.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datepicker/moment.min.js')}}"></script>
    <script src="{{asset('assets/vendor/datepicker/daterangepicker.js')}}"></script>

    <!-- Main JS-->
    <script src="{{asset('assets/js/global.js')}}"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>

</body><!-- This templates was made by Colorlib (https://colorlib.com) -->

</html>
