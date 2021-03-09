<!DOCTYPE html>
<html lang="en">


<!-- Mirrored from secuure.netlify.app/page-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Mar 2021 10:48:20 GMT -->
<!-- Added by HTTrack --><meta http-equiv="content-type" content="text/html;charset=UTF-8" /><!-- /Added by HTTrack -->
<head>
    <meta charset="utf-8" />
    <title>Secuure - Insurance Company bootsrap 5 HTML Template </title>
    <meta name="description" content="" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />

    <!-- Favicon -->
    <link rel="shortcut icon" href="images/favicon.png">
    <!-- /Favicon -->

    <!-- All css -->

    <!-- vendor -->
    <link href="css/vendors.css" rel="stylesheet" type="text/css" />
    <!-- /vendor -->

    <!-- Plugins -->
    <link rel="stylesheet" href="css/plugins.css" type="text/css" />
    <!-- /Plugins -->

    <!-- Icons -->
    <link href="css/icons.css" rel="stylesheet" type="text/css" />
    <!-- /Icons -->

    <!-- Style Css -->
    <link href="css/style.css" rel="stylesheet" type="text/css" />
    <!-- /Style Css -->

    <!-- /All css -->
</head>


<body>
    


    <!-- Singup -->
    <section class="hero-section full-screen gray-light-bg">
        <!-- Container -->
        <div class="container-fluid">
            <!-- row -->
            <div class="row align-items-center justify-content-center">
                <!-- col -->
                <div class="col-12 col-md-7 col-lg-6 col-xl-7 d-none d-lg-block">
                    <div class="bg-cover vh-120 ml-n3 background-img"
                        style="background-image: url(images/bg/login-bg.jpg);">
                        <div class="position-absolute login-signup-content">
                            <div class="position-relative text-white col-md-12 col-lg-7">
                                <h2 class="text-white text-center">Create Your Account</h2>
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
                            Signup
                        </h1>


                        <!-- Form -->
                         <form method="POST" action="{{ route('register') }}" class="login-signup-form">
                        @csrf
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Your Name
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-user-line color-primary"></i>
                                    </div>
                                     <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus  placeholder="Enter your name">

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
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
                                   <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"  placeholder="Enter your email address">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror   
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Register As
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-account-box-fill"></i>
                                    </div>
                                  <select id="role_id" class="form-control @error('role_id') is-invalid @enderror" name="role_id"  >
                                    <option  value="">Select your role</option>
                                    <option {{ old('role_id')==2 ? 'selected' :'' }} value="2">Individual Client</option>
                                    <option {{ old('role_id')==3 ? 'selected' :'' }} value="3">Insurance Company</option>
                                </select>

                                @error('role_id')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                                </div>
                            </div>

                            <!-- Password -->
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Password
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-lock-line color-primary"></i>
                                    </div>
                                      <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password"  placeholder="Enter your password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <!-- Label -->
                                <label class="pb-1">
                                    Confirm Password
                                </label>
                                <!-- Input group -->
                                <div class="input-group input-group-merge">
                                    <div class="input-icon">
                                        <i class="ri-lock-line color-primary"></i>
                                    </div>
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                </div>
                            </div>
                           

                            <!-- Submit -->
                            <button class="btn btn-lg btn-block theme-btn mt-4 mb-3">
                                Sign up
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
                <!-- /col -->
            </div>
            <!-- /row -->
        </div>
        <!-- /Container -->
    </section>
    <!-- /Singup -->



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


<!-- Mirrored from secuure.netlify.app/page-signup.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 05 Mar 2021 10:48:20 GMT -->
</html>