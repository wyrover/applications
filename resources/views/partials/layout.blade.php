<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>@if ('meta_title' != '') @yield('meta_title') @endif - Applications</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="_token" content="{!! csrf_token() !!}"/>

    <!-- stylesheets -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
    <link rel="stylesheet" href="/css/custom.css">

    <!-- Fonts -->
    <link href='https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600S' rel='stylesheet' type='text/css'>
</head>
<body>

@include('partials/nav')

<div class="container content">
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">@yield('title')</div>
            <div class="panel-body">
                @yield('content')
            </div>
        </div>
    </div>

    @if (Request::is('dashboard'))
        @yield('dboard')
    @endif
</div>
@include('partials/footer')

</body>
</html>