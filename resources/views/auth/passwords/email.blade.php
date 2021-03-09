<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from secuure.netlify.app/page-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Mar 2021 10:48:20 GMT -->
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
    


    <!-- Forgot Password -->
    <section class="full-screen">
        <!-- Container -->
        <div class="container-fluid">
            <!-- row -->
            <div class="row align-items-center justify-content-center">
                <!-- col -->
                <div class="col-12 col-md-7 col-lg-6 col-xl-7 d-none d-lg-block">
                    <div class="bg-cover vh-100 ml-n3 background-img"
                        style="background-image: url({{asset('images/bg/login-bg.jpg')}});">
                        <div class="position-absolute login-signup-content">
                            <div class="position-relative text-white col-md-12 col-lg-7">
                                <h2 class="text-white text-center">Forgot Password ?</h2>
                                <h2 class="text-white text-center">
                                    Don't Worry You Can Resets
                                </h2>
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
                            Password Reset
                        </h1>

                        <!-- Subheading -->
                        <p class="gray-500 text-center pb-15">
                            Enter your email to get a password reset link.
                        </p>

                        <!-- Form -->
                         <form method="POST" action="{{ route('password.email') }}" class="login-signup-form">
                        @csrf
                            <div class="form-group">
                                <!-- Label -->

                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-mail-line color-primary"></i>
                                    </div>
                                    <input type="email" class="form-control" placeholder="name@address.com" />
                                </div>
                            </div>

                            <!-- Submit -->
                            <button class="btn btn-block theme-btn mt-4 mb-3" type="submit">
                                Reset Password
                            </button>

                            <!-- Link -->
                            <div class="text-center">
                                <small class="text-muted text-center">
                                    Already have an account? <a href="{{URL('login')}}">Log in</a>.
                                </small>
                            </div>
                        </form>
                    </div>
                </div>
                <!-- col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </section>
    <!-- /Forgot Password -->

    <!-- JS -->

    <!-- Vendors Js -->
    <script src="{{asset('js/vendors.js')}}"></script>
    <!-- /Vendors Js -->

    <!-- plugins Js -->
    <script src="{{asset('js/plugins.js')}}"></script>
    <!-- /plugins Js -->

    <!-- Main Js -->
    <script src="{{asset('js/main.js')}}"></script>
    <!-- /Main Js -->

     <!-- /JS -->
</body>


<!-- Mirrored from secuure.netlify.app/page-forgot-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Mar 2021 10:48:20 GMT -->
</html>