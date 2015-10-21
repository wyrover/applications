<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>404 Error</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- stylesheets -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
    <link rel="stylesheet" href="/css/custom.css">
    <style>
        h3 { text-transform: uppercase!important; }
    </style>
    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600S' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="container">
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4">
            <h3><i class="fa fa-rocket fa-2x"></i> Oops! {!! $exception->getStatusCode() !!}
                @if(!empty($exception->getMessage()))
                    {{ $exception->getMessage() }}
                @else
                    {{ \Symfony\Component\HttpFoundation\Response::$statusTexts[$exception->getStatusCode()] }}
                @endif</h3>
            <p>Either the page you requested no longer exists or your trying to access a part of the site you don't have access to.</p>
            <p>Please check the URL and try again.</p>
            <p><a href="{!! goBack() !!}" class="btn btn-primary"><i class="fa fa-refresh fa-spin"></i> Go back to previous page</a></p>

        </div>
        <div class="col-md-4"></div>
    </div>
</div>

</body>
</html>