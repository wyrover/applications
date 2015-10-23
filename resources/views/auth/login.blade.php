<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Login</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- stylesheets -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
    <style>
        body {
            background-color:#fff;
            -webkit-font-smoothing: antialiased;
            font: normal 14px Roboto,arial,sans-serif;
        }
        .fp { font-size: 11px; padding: 2px 0px 2px 4px;}
        .form-login {
            background-color: #EDEDED;
            border-radius: 15px;
            border-color:#d2d2d2;
            border-width: 5px;
            box-shadow:0 1px 0 #cfcfcf;
            max-width: 300px;
            padding: 15px;
            margin: 0 auto;
            margin-top:50px;
        }

        h4 {
            border:0 solid #fff;
            border-bottom-width:1px;
            padding-bottom:10px;
            text-align: center;
        }

        .wrapper {
            text-align: center;
        }
    </style>
    <script src="/js/jquery-1.11.1.js"></script>
    <script>
        window.setTimeout(function() {
            $(".alert").delay(600, 0).slideUp(190, function(){
              $(this).remove();
            });
         }, 4000);
    </script>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="form-login">
                <?php
                if (App::environment('local')) {
                    $segment = \Request::url();
                    $search = ['http://', 'https://', '.applications', '.app', '/' . \Request::segment(1)];
                    $replace = ['', '', '', '', ''];
                    $output = str_replace($search, $replace, $segment);
                    $company = \App\Company::where('url', $output)->first();
                }
                if (App::environment('production')) {
                    $segment = \Request::url();
                    $search = ['http://', 'https://', '.madesimpleltd', '.co.uk', '/' . \Request::segment(1)];
                    $replace = ['', '', '', '', ''];
                    $output = str_replace($search, $replace, $segment);
                    $company = \App\Company::where('url', $output)->first();
                }
                ?>
                @if (! empty($company->logo))
                    <img src="/uploads/{{ $company->logo }}" width="100" style="display: flex; justify-content: center; align-items: center;margin: 0px 0px 30px 80px;  ">
                @else
                    <h4>Login</h4>
                @endif
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                            @foreach ($errors->all() as $error)
                                <span>{{ $error }}</span><br /><br />
                            @endforeach
                    </div>
                @endif
                <form method="POST" action="/auth/login">
                    {!! csrf_field() !!}
                    <input type="text" id="userName" class="form-control input-sm chat-input" placeholder="username" name="username" value="{{ old('username') }}" />
                    <br />
                    <input type="password" id="userPassword" class="form-control input-sm chat-input" placeholder="password" name="password" />
                    <br />
                    <div class="wrapper">
                        <span class="group-btn">
                            <button type="submit" class="btn btn-primary btn-md">login <i class="fa fa-sign-in"></i></button>
                        </span>
                    </div>
                </form><br />
                <a href="{{ url('/password/email') }}" class="fp">Forgot Password?</a>
            </div>

        </div>
    </div>
</div>
<!-- javascript/jQuery -->
<script src="/js/jquery-1.11.1.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/sweetalert.min.js"></script>
<script src="/js/moment/moment.js"></script>

@include('flash')
</body>
</html>