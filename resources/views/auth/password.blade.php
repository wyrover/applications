<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Password Reset</title>

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
                <h4>Password Reset</h4>
                @if (count($errors) > 0)
                    <div class="alert alert-danger">
                        <strong>Whoops!</strong> There were some problems with your input.<br><br>
                        @foreach ($errors->all() as $error)
                            <span>{{ $error }}</span><br /><br />
                        @endforeach
                    </div>
                @endif
                <form method="POST" action="/password/email">
                    {!! csrf_field() !!}
                    <input class="form-control input-sm chat-input" placeholder="Email Address" type="email" name="email" value="{{ old('email') }}" />
                    <br />
                    <div class="wrapper">
                        <span class="group-btn">
                            <button type="submit" class="btn btn-primary btn-md">Send Password Reset Link</button>
                        </span>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>

</body>
</html>