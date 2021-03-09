<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from secuure.netlify.app/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Mar 2021 10:48:19 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Secuure - Insurance Company bootsrap 5 HTML Template </title>
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('images/favicon.png')}}">
    <!-- /Favicon -->

    <!-- All css -->

    <!-- vendor -->
    <link href="{{asset('css/vendors.css')}}" rel="stylesheet" type="text/css" />
    <!-- /vendor -->

    <!-- Plugins -->
    <link rel="stylesheet" href="{{asset('css/plugins.css')}}" type="text/css" />
    <!-- /Plugins -->

    <!-- Icons -->
    <link href="{{asset('css/icons.css')}}" rel="stylesheet" type="text/css" />
    <!-- /Icons -->

    <!-- Style Css -->
    <link href="{{asset('css/style.css')}}" rel="stylesheet" type="text/css" />
    <!-- /Style Css -->

    <!-- /All css -->
</head>


<body>
    


    <!-- Login -->
    <section class="hero-section full-screen gray-light-bg">
        <!-- /Container -->
        <div class="container-fluid">
            <!-- row -->
            <div class="row align-items-center justify-content-center">
                <!-- col -->
                <div class="col-12 col-md-7 col-lg-6 col-xl-7 d-none d-lg-block">
                    <div class="bg-cover vh-100 ml-n3 background-img"
                        style="background-image: url(images/bg/login-bg.jpg);">
                        <div class="position-absolute login-signup-content">
                            <div class="position-relative text-white col-md-12 col-lg-7">
                                <h2 class="text-white text-center">Welcome Back !</h2>
                                <p class="lead text-white text-center">
                                    Lorem ipsum dolor sit amet, consectetur adipiscing elit. Duis tempus eleifend
                                    tortor, vel molestie
                                    orci feugiat sit amet. Donec posuere rhoncus tempus.
                                </p>
                                <div class="footer-contact-icon text-center">
                                    <a href="#" title="facebook"><i class="ri-facebook-fill"></i></a>
                                    <a href="#" title="twitter"><i class="ri-twitter-line"></i></a>
                                    <a href="#" title="google-plus"><i class="ri-google-fill"></i></a>
                                    <a href="#" title="google-plus"><i class="ri-linkedin-fill"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /col -->
                <!-- col -->
                <div class="col-12 col-md-5 col-lg-6 col-xl-5 px-lg-6 my-5">
                    <div class="login-signup-wrap px-4 px-lg-5 my-5">
                        <!-- Heading -->
                        <h1 class="text-center mb-1">
                            Sign In
                        </h1>

                        <!-- Subheading -->
                        <p class="text-muted text-center mb-5">
                            Free access to our dashboard.
                        </p>

                        <!-- Form -->
                       <form method="POST" action="{{ route('login') }}" class="login-signup-form">
                        @csrf
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Email Address
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-mail-line color-primary"></i>
                                    </div>
                                     <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <div class="row">
                                    <div class="col">
                                        <label class="pb-1">Password</label>
                                    </div>
                                    <div class="col-auto">
                                        <a href="{{URL('password/reset')}}" class="form-text small text-muted">
                                            Forgot password?
                                        </a>
                                    </div>
                                </div>
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-lock-line color-primary"></i>
                                    </div>
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>

                            <!-- Submit -->
                            <button class="btn btn-lg btn-block theme-btn mt-4 mb-3">
                                Sign In
                            </button>

                            <!-- Link -->
                            <div class="text-center">
                                <small class="text-muted text-center">
                                    New User? <a href="{{URL('register')}}">Sign up</a>.
                                </small>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </section>
    <!-- /Login -->

    <!-- JS -->

    <!-- Vendors Js -->
    <script src="js/vendors.js"></script>
    <!-- /Vendors Js -->

    <!-- plugins Js -->
    <script src="js/plugins.js"></script>
    <!-- /plugins Js -->

    <!-- Main Js -->
    <script src="js/main.js"></script>
    <!-- /Main Js -->

     <!-- /JS -->
</body>


<!-- Mirrored from secuure.netlify.app/page-login.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Mar 2021 10:48:20 GMT -->
</html>