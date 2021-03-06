<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title> @yield('pageTitle')</title>

    <!-- Fontfaces CSS-->
    <link href="{{asset('AdminStyle/css/font-face.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('AdminStyle/vendor/font-awesome-4.7/css/font-awesome.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('AdminStyle/vendor/font-awesome-5/css/fontawesome-all.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('AdminStyle/vendor/mdi-font/css/material-design-iconic-font.min.css')}}" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="{{asset('AdminStyle/vendor/bootstrap-4.1/bootstrap.min.css')}}" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="{{asset('AdminStyle/vendor/animsition/animsition.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('AdminStyle/vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('AdminStyle/vendor/wow/animate.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('AdminStyle/vendor/css-hamburgers/hamburgers.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('AdminStyle/vendor/slick/slick.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('AdminStyle/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('AdminStyle/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">
 <link href="{{asset('AdminStyle/css/bootstrap-datetimepicker.min.css')}}" rel="stylesheet" media="all">
    <!-- Main CSS-->
    <link href="{{asset('AdminStyle/css/theme.css')}}" rel="stylesheet" media="all">
        <link href="{{asset('AdminStyle/js/jquery-ui/jquery-ui.css')}}" rel="stylesheet" media="all">
           <link href="{{asset('AdminStyle/js/jquery-ui/jquery-ui.structure.css')}}" rel="stylesheet" media="all">
    <body class="animsition">
    <div class="page-wrapper">
        <!-- HEADER MOBILE-->
        <header class="header-mobile d-block d-lg-none">
            <div class="header-mobile__bar">
                <div class="container-fluid">
                    <div class="header-mobile-inner">
                        <a class="logo" href="index.html">
                            <img src="{{asset('AdminStyle/images/icon/logo.png')}}" alt="CoolAdmin" />
                        </a>
                        <button class="hamburger hamburger--slider" type="button">
                            <span class="hamburger-box">
                                <span class="hamburger-inner"></span>
                            </span>
                        </button>
                    </div>
                </div>
            </div>
            <nav class="navbar-mobile">
                <div class="container-fluid">
                    <ul class="navbar-mobile__list list-unstyled">
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-tachometer-alt"></i>Dashboard</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="index.html">Dashboard 1</a>
                                </li>
                                <li>
                                    <a href="index2.html">Dashboard 2</a>
                                </li>
                                <li>
                                    <a href="index3.html">Dashboard 3</a>
                                </li>
                                <li>
                                    <a href="index4.html">Dashboard 4</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a href="chart.html">
                                <i class="fas fa-chart-bar"></i>Charts</a>
                        </li>
                        <li>
                            <a href="table.html">
                                <i class="fas fa-table"></i>Tables</a>
                        </li>
                        <li>
                            <a href="form.html">
                                <i class="far fa-check-square"></i>Forms</a>
                        </li>
                        <li>
                            <a href="calendar.html">
                                <i class="fas fa-calendar-alt"></i>Calendar</a>
                        </li>
                        <li>
                            <a href="map.html">
                                <i class="fas fa-map-marker-alt"></i>Maps</a>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-copy"></i>Pages</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="login.html">Login</a>
                                </li>
                                <li>
                                    <a href="register.html">Register</a>
                                </li>
                                <li>
                                    <a href="forget-pass.html">Forget Password</a>
                                </li>
                            </ul>
                        </li>
                        <li class="has-sub">
                            <a class="js-arrow" href="#">
                                <i class="fas fa-desktop"></i>UI Elements</a>
                            <ul class="navbar-mobile-sub__list list-unstyled js-sub-list">
                                <li>
                                    <a href="button.html">Button</a>
                                </li>
                                <li>
                                    <a href="badge.html">Badges</a>
                                </li>
                                <li>
                                    <a href="tab.html">Tabs</a>
                                </li>
                                <li>
                                    <a href="card.html">Cards</a>
                                </li>
                                <li>
                                    <a href="alert.html">Alerts</a>
                                </li>
                                <li>
                                    <a href="progress-bar.html">Progress Bars</a>
                                </li>
                                <li>
                                    <a href="modal.html">Modals</a>
                                </li>
                                <li>
                                    <a href="switch.html">Switchs</a>
                                </li>
                                <li>
                                    <a href="grid.html">Grids</a>
                                </li>
                                <li>
                                    <a href="fontawesome.html">Fontawesome Icon</a>
                                </li>
                                <li>
                                    <a href="typo.html">Typography</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- END HEADER MOBILE-->

        <!-- MENU SIDEBAR-->
        <aside class="menu-sidebar d-none d-lg-block">
            <div class="logo">
                <a href="#">
                    <img src="{{asset('AdminStyle/images/icon/logo.png')}}" alt="Cool Admin" />
                </a>
            </div>
            <div class="menu-sidebar__content js-scrollbar1">
                <nav class="navbar-sidebar">
                    <ul class="list-unstyled navbar__list">
                      
                    <li class="@yield('dashboard_select')">
                                    <a href="{{url('admin/dashboard')}}">Dashboard</a>
                                </li>
                   
                                @if(session()->get("ADMINROLE")!=2)
                                 <li class="@yield('product_select')">
                                    <a href="{{url('admin/product')}}">Product</a>
                                </li>
                                      @if(session()->get("ADMINROLE")!=1)
                                 <li class="@yield('coupon_select')">
                                    <a href="{{url('admin/coupon')}}">Coupon</a>
                                </li>
                                 <li class="@yield('tax_select')">
                                    <a href="{{url('admin/tax')}}">Tax</a>
                                </li>
                                 <li class="@yield('otheradmin_select')">
                                    <a href="{{url('admin/otheradmin')}}">Other Admin</a>
                                </li>
                                             <li class="@yield('category_select')">
                                    <a href="{{url('admin/category')}}">Category</a>
                                </li>
                             <li class="@yield('brand_select')">
                                    <a href="{{url('admin/brand')}}">Brand</a>
                                </li>
                  <li class="@yield('color_select')">
                                    <a href="{{url('admin/color')}}">Color</a>
                                </li>
              <li class="@yield('size_select')">
                                    <a href="{{url('admin/size')}}">Size</a>
                                </li>
                                <li class="@yield('setting_select')">
                                    <a href="{{url('admin/setting')}}">Setting</a>
                                </li>
                                             <li class="@yield('banner_select')">
                                    <a href="{{url('admin/banner')}}">Banner</a>
                                </li>
                                 @endif
                                @endif
                          
                                <li class="@yield('order_select')">
                                    <a href="{{url('admin/order')}}">Order</a>
                                </li>
                              
                            
</ul>
                </nav>
            </div>
        </aside>
        <!-- END MENU SIDEBAR-->

        <!-- PAGE CONTAINER-->
        <div class="page-container">
            <!-- HEADER DESKTOP-->
            <header class="header-desktop">
                <div class="section__content section__content--p30">
                    <div class="container-fluid">
                        <div class="header-wrap">
                        <form class="form-header" action="" method="POST">
                             
                            </form>
                            <div class="header-button">
                                <div class="noti-wrap">
                
                 
                   
                                <div class="account-wrap">
                                    <div class="account-item clearfix js-item-menu">
                                        <div class="image">
                                         
                                        </div>
                                        <div class="content">
                                            <a class="js-acc-btn" href="#">
                                           {{session()->get('ADMINUSER')}}</a>
                                        </div>
                                        <div class="account-dropdown js-dropdown">
                                            
                                            <div class="account-dropdown__body">
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-account"></i>Account</a>
                                                </div>
                                                <div class="account-dropdown__item">
                                                    <a href="#">
                                                        <i class="zmdi zmdi-settings"></i>Setting</a>
                                                </div>
                                                
                                            </div>
                                            <div class="account-dropdown__footer">
                                                <a href="{{url('admin/logout')}}">
                                                    <i class="zmdi zmdi-power"></i>Logout</a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <div class="main-content">
            <div class="section__content section__content--p30">
                    <div class="container-fluid">
                    

@section("container")

@show


<div class="row">
                            <div class="col-md-12">
                                <div class="copyright">
                                    <p>Copyright ?? @php echo date("Y") @endphp Colorlib. All rights reserved. Template by <a href="https://colorlib.com">Colorlib</a>.</p>
                                </div>
                            </div>
                        </div>
</div>
</div>

            </div>

</div>
              <!-- Jquery JS-->
   <script src="{{asset('AdminStyle/vendor/jquery-3.2.1.min.js')}}"></script>
       <script src="{{asset('AdminStyle/js/jquery-ui/jquery-ui.min.js')}}"></script>
    <!-- Bootstrap JS-->
    <script src="{{asset('AdminStyle/vendor/bootstrap-4.1/popper.min.js')}}"></script>
    <script src="{{asset('AdminStyle/vendor/bootstrap-4.1/bootstrap.min.js')}}"></script>
    <!-- Vendor JS       -->
    <script src="{{asset('AdminStyle/vendor/slick/slick.min.js')}}">
    </script>
    <script src="{{asset('AdminStyle/vendor/wow/wow.min.js')}}"></script>
    <script src="{{asset('AdminStyle/vendor/animsition/animsition.min.js')}}"></script>
    <script src="{{asset('AdminStyle/vendor/bootstrap-progressbar/bootstrap-progressbar.min.js')}}">
    </script>
    <script src="{{asset('AdminStyle/vendor/counter-up/jquery.waypoints.min.js')}}"></script>
    <script src="{{asset('AdminStyle/vendor/counter-up/jquery.counterup.min.js')}}">
    </script>
    <script src="{{asset('AdminStyle/vendor/circle-progress/circle-progress.min.js')}}"></script>
    <script src="{{asset('AdminStyle/vendor/perfect-scrollbar/perfect-scrollbar.js')}}"></script>
    <script src="{{asset('AdminStyle/vendor/chartjs/Chart.bundle.min.js')}}"></script>
    <script src="{{asset('AdminStyle/vendor/select2/select2.min.js')}}">
       <script src="{{asset('AdminStyle/vendor/jquery-3.2.1.min.js')}}"></script>
    </script>

    <!-- Main JS-->
    <script src="{{asset('AdminStyle/js/main.js')}}"></script>
       <script src="{{asset('AdminStyle/js/custom.js')}}"></script>