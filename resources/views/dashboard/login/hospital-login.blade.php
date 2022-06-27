<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Hospital Login Page</title>
    <link href="{{asset('assets/backend/vendors/bootstrap/dist/css/bootstrap.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/backend/vendors/font-awesome/css/font-awesome.min.css')}}" rel="stylesheet">

    <link href="{{asset('assets/backend/vendors/nprogress/nprogress.css')}}" rel="stylesheet">

    <link href="{{asset('assets/backend/vendors/google-code-prettify/bin/prettify.min.css')}}" rel="stylesheet">


    <link href="{{asset('assets/backend/build/css/custom.min.css')}}" rel="stylesheet">
</head>
<body class="login">
<div>
    <a class="hiddenanchor" id="signup"></a>
    <a class="hiddenanchor" id="signin"></a>

    <div class="login_wrapper">
        <div class="animate form login_form">
            <section class="login_content">
                @include('backend.layouts.messages')
                <form method="Post" action="{{route('hospital-login')}}">
                    @csrf
                    <h1>hospital Login</h1>
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
</div>
</body>
</html>
