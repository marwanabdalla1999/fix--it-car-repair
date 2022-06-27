<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="{{ asset('assets/css2/style.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css2/animate.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css2/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css2/mohamed.css') }}">

    <title>Doctor Login Page</title>
    <link href="{{asset('assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/css2/style.css') }}">

    <link href="{{asset('assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('assets/frontend/css/style.css') }}">

    <link href="{{asset('assets/backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/backend/vendors/nprogress/nprogress.css')}}" rel="stylesheet">

    <link href="{{asset('assets/backend/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">


    <link href="{{asset('assets/backend/build/css/custom.min.css')}}" rel="stylesheet">
</head>

<body class="login">
    <section id="aa-myaccount">
        <div class="container">
            <div class="row">
                <div class="col-md-12" id="signin">
                    <div class="aa-myaccount-area bgsign">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="aa-myaccount-login">
                                    <div class="titlepage text_align_center">
                                        <h3 style="color:#0B4A93 ; font-weight:bold; padding-top:10px" > Login To Doctor Dashboard </h3>
                                     </div>
                                     <h3 style="color: #0B4A93 ; text-align:center ;">Enter your email and password to sign in</h3>
                                     <br>
                                   
                                    @include('frontend.layouts.messages')
                                    <form action="{{route('doctor-login')}}" method="post" class="aa-login-form offset-lg-1">
                                        @csrf
                                        <div class="form-group form-group-sm">
                                            <label class="input_container" for="email">      <p style="color: #0B4A93 ;">Email:</p></label>
                                            <input type="text" name="email" id="email" placeholder="E-mail">
                                            <a href="" style="color: red;">{{$errors->first('email')}}</a>
                                        </div>
                                        <div class="form-group form-group-sm">
                                            <label  class="input_container" for="password"><p style="color: #0B4A93 ;">Password:</p></label>
                                            <input type="password" id="password" name="password" placeholder="Password">
                                            <a href="" style="color: red;">{{$errors->first('password')}}</a>
                                        </div>
                                                                
                                        {{-- <div class="remember" style="padding-top:8px">
                                            <input type="checkbox" name="" value="" style="margin-right:10px">Remember Me
                                        </div> --}}
                                       
                                        <div class="form-group w-100">
                                            <button class="btn btn-primary btn-block mb-4" type="submit"  class="aa-browse-btn ">    <i class="fa fa-lock"></i> Login</button>
                                        </div>
                                       
                                    </form>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="about_img text_align_center">
                                   <figure><img src="{{asset('assets/images/doctor1.png')}}" alt="#"/></figure>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
           
                
            </div>
            <br>
            </div>
    </section>   
{{-- <div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                @include('backend.layouts.messages')
                <form method="Post" action="{{route('doctor-login')}}">
                    @csrf
                    <h1>Doctor Login</h1>
                    <div class="form-group form-group-sm">
                        <input type="text" name="email" class="form-control" placeholder="Email">
                    </div>
                    <div class="form-group form-group-sm">
                        <input type="password" name="password" class="form-control" placeholder="Password">
                    </div>
                    <div class="form-group form-group-sm">
                       <button class="btn btn-success btn-sm pull-left">Login</button>
                    </div>

                    <div class="clearfix"></div>
                </form>
            </section>
        </div>

    </div>
</div> --}}
</body>
</html>
