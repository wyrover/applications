<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- stylesheets -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
    <link rel="stylesheet" href="/css/custom.css">
</head>
<body>

<div class="container" style="margin-top: 20px;">
    <div class="row">
        <div class="col-md-12 col-sm-12 col-xs-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    <h3 class="panel-title">Support Request</h3>
                </div>
                <div class="panel-body">
                    <h4>Hi Admin,</h4>
                    <p>{!! $name !!} has sent a support request from Applications App.<br />User details below:</p>
                    <p><strong>Name:</strong> {!! $name !!}</p>
                    <p><strong>Email:</strong> {!! $email !!}</p>
                    <p><strong>Phone:</strong> {!! $tel !!}</p>
                    <p><strong>Comments:</strong> {!! $comments !!}</p>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>