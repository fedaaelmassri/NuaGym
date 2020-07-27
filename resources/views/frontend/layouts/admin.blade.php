<!DOCTYPE html>
<!--
This is a starter template page. Use this page to start your new project from
scratch. This page gets rid of all links and provides the needed markup only.
-->
<?php
 $textdir='';
 if(App::getLocale() == 'en'){
    $textdir = 'ltr';
}elseif (App::getLocale() == 'ar')
$textdir = 'rtl';
?>
 
 <html lang="{{ str_replace('_', '-', app()->getLocale()) }}" dir="<?php echo $textdir; ?>">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>
       Member Account
</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <link rel="stylesheet" href="{{asset('public/assets/bower_components/bootstrap/dist/css/bootstrap.min.css')}}">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/assets/bower_components/font-awesome/css/font-awesome.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="{{asset('public/assets/bower_components/Ionicons/css/ionicons.min.css')}}">
  <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.css">

  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/assets/dist/css/AdminLTE.min.css')}}">
  <!-- AdminLTE Skins. We have chosen the skin-blue for this starter
        page. However, you can choose any other skin. Make sure you
        apply the skin class to the body tag so the changes take effect. -->
  <link rel="stylesheet" href="{{asset('public/assets/dist/css/skins/skin-blue.min.css')}}">
  <!-- AdminLTE Skins. Choose a skin from the css/skins
       folder instead of downloading all of them to reduce the load. -->
       <link rel="stylesheet" href="{{asset('public/assets/dist/css/skins/_all-skins.min.css')}}">
       <link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/css/toastr.min.css" rel="stylesheet">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
<style>
[dir="rtl"] .sidebar-menu > li > a > .fa,
.sidebar-menu > li > a > .glyphicon,
.sidebar-menu > li > a > .ion{
  padding-right: 43px !important;
}
[dir="rtl"] .sidebar-menu > li > a > span{
  padding-right: 30px  !important;
}
[dir="rtl"] .profile{
  margin-left: 15px !important;

}
/* [dir="rtl"]  .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
    /* float: left; */
    /* float: right !important;
 
} */
/* [dir="ltr"]  .col-sm-1, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9 {
    float: left !important; */
    /* float: right !important; */
 
/* }  */

</style>
@stack('style')

      </head>
<!--
BODY TAG OPTIONS:
=================
Apply one or more of the following classes to get the
desired effect
|---------------------------------------------------------|
| SKINS         | skin-blue                               |
|               | skin-black                              |
|               | skin-purple                             |
|               | skin-yellow                             |
|               | skin-red                                |
|               | skin-green                              |
|---------------------------------------------------------|
|LAYOUT OPTIONS | fixed                                   |
|               | layout-boxed                            |
|               | layout-top-nav                          |
|               | sidebar-collapse                        |
|               | sidebar-mini                            |
|---------------------------------------------------------|
-->
<body class="hold-transition skin-blue sidebar-mini">
<div class="wrapper">

  <!-- Main Header -->
  <header class="main-header">

    <!-- Logo -->
    <a href="{{route('memberdashboard')}}" class="logo">
      <!-- mini logo for sidebar mini 50x50 pixels -->
       <!-- logo for regular state and mobile devices -->
      <span class="logo-lg">  {{trans('lang.member_dashbord.dashboard_lbl')}}</span>
    </a>

    <!-- Header Navbar -->
    <nav class="navbar navbar-static-top" role="navigation">
      <!-- Sidebar toggle button-->
      <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
        <span class="sr-only">Toggle navigation</span>
      </a>
      <!-- Navbar Right Menu -->
      <div class="navbar-custom-menu">
        <ul class="nav navbar-nav">

          <!-- User Account Menu -->
          <li class="dropdown user user-menu">
            <!-- Menu Toggle Button -->
            <a href="#" class="dropdown-toggle" data-toggle="dropdown">
              <!-- The user image in the navbar-->
              <!-- <img src="{{asset('public/assets/dist/img/user2-160x160.jpg')}}" class="user-image" alt="User Image"> -->
              @if(Auth::guard('members')->user()->image!='')
                        <img  src="{{ asset('public/storage/' . Auth::guard('members')->user()->image) }}" class="user-image" alt="User Image" />
                   @else
                   <img src="{{asset('public/assets/dist/img/avatablu.png')}}"  class="user-image" alt="User Image">

                        @endif

              <!-- hidden-xs hides the username on small devices so only the image appears. -->
              <span class="hidden-xs">
              {{ Auth::guard('members')->user()->name  }}

              </span>
            </a>
            <ul class="dropdown-menu">
              <!-- The user image in the menu -->
              <li class="user-header">
                <!-- <img src="{{asset('public/assets/dist/img/user2-160x160.jpg')}}" class="img-circle" alt="User Image"> -->

                @if(Auth::guard('members')->user()->image!='')
                        <img  src="{{ asset('public/storage/' . Auth::guard('members')->user()->image) }}" class="img-circle" alt="User Image"  />
                   @else
                   <img src="{{asset('public/assets/dist/img/avatablu.png')}}"  class="img-circle" alt="User Image">

                        @endif
                <p>
                   <small>
                   {{ Auth::guard('members')->user()->email  }}

               </small>
                </p>
              </li>
                <!-- Menu Footer-->
              <li class="user-footer">
              <div class="pull-left" >
                  <a href="{{route('home')}}" class="btn btn-default btn-flat">            
                        {{trans('lang.home.menu.home')}}
</a>
                </div>

                <div class="pull-left profile" style="margin-left:30px;">
                  <a href="{{route('member.memberprofile.edit')}}" class="btn btn-default btn-flat">{{trans('lang.member_dashbord.profile_lbl')}}</a>
                </div>
                <div class="pull-right">
                  <a href="{{route('member.logout')}}" class="btn btn-default btn-flat">    
                                {{trans('lang.home.menu.logout')}}
</a>
                </div>
              </li>
            </ul>
          </li>
         </ul>
      </div>
    </nav>
  </header>
  <!-- Left side column. contains the logo and sidebar -->
  <aside class="main-sidebar">

    <!-- sidebar: style can be found in sidebar.less -->
    <section class="sidebar">

      <!-- Sidebar Menu -->
      <ul class="sidebar-menu" data-widget="tree">
         <!-- Optionally, you can add icons to the links -->
        <li class="{{Route::currentRouteName()=='memberdashboard'?'active':''}} "><a href="{{route('memberdashboard')}}"><i class="glyphicon glyphicon-list-alt"></i> <span>{{trans('lang.member_dashbord.programs_lbl')}}</span></a></li>
        <li  class="{{Route::currentRouteName()=='memberclass'?'active':''}} "><a href="{{route('memberclass')}}"><i class="fa fa-fw fa-group"></i> <span>{{trans('lang.member_dashbord.classes_lbl')}}  </span></a></li>
        <li  class="{{Route::currentRouteName()=='memberevent'?'active':''}} "><a href="{{route('memberevent')}}"><i class="glyphicon glyphicon-calendar"></i> <span>{{trans('lang.member_dashbord.events_lbl')}}  </span></a></li>
        <li  class="{{Route::currentRouteName()=='paymentMethod'?'active':''}} "><a href="{{route('paymentMethod')}}"><i class="glyphicon glyphicon-credit-card"></i> <span>{{trans('lang.member_dashbord.payment_lbl')}}  </span></a></li>
        <li  class="{{Route::currentRouteName()=='transactions'?'active':''}} "><a href="{{route('transactions')}}"><i class="fa fa-fw fa-bar-chart"></i> <span>{{trans('lang.member_dashbord.transactions_lbl')}}  </span></a></li>
        <li  class="{{Route::currentRouteName()=='member.memberprofile.edit'?'active':''}} "> <a href="{{route('member.memberprofile.edit')}}"><i class="glyphicon glyphicon-user"></i> <span>{{trans('lang.member_dashbord.profile_lbl')}}  </span></a></li>

        <!-- <li class="treeview">
          <a href="#"><i class="fa fa-link"></i> <span>Payment Methodes</span>
            <span class="pull-right-container">
                <i class="glyphicon glyphicon-list-alt"></i>
              </span>
          </a>
          <ul class="treeview-menu">
            <li><a href="#">Link in level 2</a></li>
            <li><a href="#">Link in level 2</a></li>
          </ul>
        </li> -->
      </ul>
      <!-- /.sidebar-menu -->
    </section>
    <!-- /.sidebar -->
  </aside>

  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">


    <!-- Main content -->
    <section class="content container-fluid">

    @yield('content')

      <!--------------------------
        | Your Page Content Here |
        -------------------------->

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->

  <!-- Main Footer -->
  

   
  <!-- Add the sidebar's background. This div must be placed
  immediately after the control sidebar -->
  <div class="control-sidebar-bg"></div>
</div>
<!-- ./wrapper -->

<!-- REQUIRED JS SCRIPTS -->

<!-- jQuery 3 -->
<script src="{{asset('public/assets/bower_components/jquery/dist/jquery.min.js')}}"></script>
<!-- Bootstrap 3.3.7 -->
<script src="{{asset('public/assets/bower_components/bootstrap/dist/js/bootstrap.min.js')}}"></script>
<!-- SlimScroll -->
<script src="{{asset('public/assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js')}}"></script>
<!-- FastClick -->
<script src="{{asset('public/assets/bower_components/fastclick/lib/fastclick.js')}}"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js"></script>

<!-- AdminLTE App -->
<script src="{{asset('public/assets/dist/js/adminlte.min.js')}}"></script>

<!-- Optionally, you can add Slimscroll and FastClick plugins.
     Both of these plugins are recommended to enhance the
     user experience. -->
     <script>
      $(document).ready(function() {
        $().ready(function() {
     @if (session('message'))

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




        });
      });
    </script>


     @yield('script')
</body>
</html>
