<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'NAU GYM') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
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
    <div id="app">
    <div class="topnav">
  <a class="active"  href="{{ route('member.registration') }}">{{ __('Register') }}</a>
  <a href="{{ route('login') }}">{{ __('Login') }}</a>
   <div class="brand">
  <a href="{{ route('home') }}">
  Home

                  </a>  </div>
</div>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
</html>
