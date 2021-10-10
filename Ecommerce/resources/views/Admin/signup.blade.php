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
    <title>Register</title>

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
    <link href="{[asset('AdminStyle/vendor/select2/select2.min.css')}}" rel="stylesheet" media="all">
    <link href="{{asset('AdminStyle/vendor/perfect-scrollbar/perfect-scrollbar.css')}}" rel="stylesheet" media="all">

    <!-- Main CSS-->
    <link href="{{asset('AdminStyle/css/theme.css')}}" rel="stylesheet" media="all">

</head>
<body class="animsition">
    <div class="page-wrapper">
        <div class="page-content--bge5">
            <div class="container">
                <div class="login-wrap">
                    <div class="login-content">
                        <div class="login-logo">
                            <a href="#">
                                <img src="{{asset('AdminStyle/images/icon/logo.png')}}" alt="CoolAdmin">
                            </a>
                        </div>
                        <p>
                                    Already have account?
                                    <a href="{{url('admin')}}">Sign In</a>
                                </p>
                                
                                             
                                                    	
                                             
                                        
                                @error('username')
    @if($message!="")
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
     
        {{$message}}	
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
@endif
@enderror          
@error('mobile')
    @if($message!="")
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
     
        {{$message}}	
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
@endif
@enderror  
@error('password')
    @if($message!="")
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
     
        {{$message}}	
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
@endif
@enderror        
@error('email')
    @if($message!="")
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
     
        {{$message}}	
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
@endif
@enderror        
@error('post')
    @if($message!="")
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
     
        {{$message}}	
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
@endif
@enderror   

@if(session()->has("successmsg"))
<div class="sufee-alert alert with-close alert-success alert-dismissible fade show">
  {{session()->get("successmsg")}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
@endif

                        <div class="login-form">
                            <form action="" method="post">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input class="au-input au-input--full" value="{{old('username')}}" type="text" name="username" placeholder="Username">
                                </div>
                                <div class="form-group">
                                    <label>Email Address</label>
                                    <input class="au-input au-input--full"  value="{{old('email')}}"  type="email" name="email" placeholder="Email">
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input class="au-input au-input--full"  value="{{old('password')}}"  type="password" name="password" placeholder="Password">
                                </div>
                                <div class="form-group">
                                    <label>Mobile</label>
                                    <input class="au-input au-input--full"  value="{{old('mobile')}}"   type="text" name="mobile" placeholder="Mobile">
                                </div>
                                <div class="container">  
                                POST
                                    <div class="row">
                                        <div class="col-6 col-lg-6">
                                          
                                <div class="login-checkbox">
                                    <label>
                                        <input type="radio" value="vendor" name="post">Vendor
                                    </label>
                                </div>
</div>
                                <div class="login-checkbox">
                                    <label>
                                        <input type="radio" value="rider" name="post">Rider
                                    </label>
                                </div> 
</div> 
                      </div>
                      
                                
                                <div class="login-checkbox">
                                    <label>
                                        <input type="checkbox" value="agree" name="aggree">Agree the terms and policy
                                    </label>
                                </div>
                            @if(session()->has('agreecondition'))
    <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
  {{session()->get("agreecondition")}}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">×</span>
        </button>
    </div> 
    @endif
      @csrf
                                <button class="au-btn au-btn--block au-btn--green m-b-20" type="submit">register</button>
                     
                            </form>
                            <div class="register-link">
                             
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>

    <!-- Jquery JS-->
    <script src="{{asset('AdminStyle/vendor/jquery-3.2.1.min.js')}}"></script>
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
    </script>

    <!-- Main JS-->
    <script src="{{asset('AdminStyle/js/main.js')}}"></script>

</body>

</html>
<!-- end document-->