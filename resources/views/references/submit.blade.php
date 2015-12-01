<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Reference Submission</title>

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <!-- stylesheets -->
    <link rel="stylesheet" href="/css/bootstrap.css">
    <link rel="stylesheet" href="/css/font-awesome.css">
    <link rel="stylesheet" href="/css/sweetalert.css">
    <link rel="stylesheet" href="/css/custom.css">

    <!-- Fonts -->
    <link href='//fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600S' rel='stylesheet' type='text/css'>
</head>
<body>

<div class="nav-side-menu">
    <div class="brand">
        @if (! empty($company))
            <img src="/uploads/{!! $company->logo !!}" width="100">
        @endif
    </div>
</div>

<div class="container content">
    <div class="col-lg-12 col-md-6 col-sm-4 col-xs-4">
        {!! Form::open(['url' => 'reference/'. $code .'/submit', 'class' => 'form-horizontal']) !!}

        <input type="hidden" name="code" value="{!! $code !!}">
        <input type="hidden" name="reference_id" value="{!! $referee->id !!}">

        <div class="panel panel-default">
            <div class="panel-heading">Applicant Details</div>
            <div class="panel-body">
                <div class="col-md-4 col-sm-2">
                    @if (! empty($referee->first_name))
                        <input type="hidden" name="first_name" value="{!! $referee->first_name !!}">

                        <strong>First Name</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {!! $referee->first_name !!}
                    @endif
                </div>
                <div class="col-md-4 col-sm-2">
                    @if (! empty($referee->middle_name))
                        <input type="hidden" name="middle_name" value="{!! $referee->middle_name !!}">
                        <strong>Middle Names</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; {!! $referee->middle_name !!}
                    @else
                        <strong>Middle Names</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -
                    @endif
                </div>
                <div class="col-md-4 col-sm-2">
                    @if (! empty($referee->last_name))
                        <input type="hidden" name="surname" value="{!! $referee->last_name !!}">

                        <strong>Surname</strong>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;{!! $referee->last_name !!}
                    @endif
                </div>
            </div>
        </div>

        <div class="panel panel-default">
            <div class="panel-heading">Reference Details</div>
            <div class="panel-body">

                <div class="row">
                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="col-sm-4">Your Name</div>
                            <div class="col-lg-7">
                                <input type="text" name="name" class="form-control" value="{!! $referee->referee_name !!}" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Telephone</div>
                            <div class="col-lg-7">
                                <input type="text" name="phone" class="form-control" value="{!! old('phone') !!}" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Position</div>
                            <div class="col-lg-7">
                                <input type="text" name="position" class="form-control" value="" autocomplete="off">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Your Email Address</div>
                            <div class="col-lg-7">
                                <input type="text" name="email_address" class="form-control" value="{!! $referee->referee_name !!}" autocomplete="off">

                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">

                        <div class="form-group">
                            <div class="col-sm-4">Date Applicant Started</div>
                            <div class="col-lg-7">
                                <input type="text" name="applicant_started" class="form-control" value="" autocomplete="off" placeholder="dd/mm/yyyy">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Date Applicant Left</div>
                            <div class="col-lg-7">
                                <input type="text" name="date_left" class="form-control" value="" autocomplete="off" placeholder="dd/mm/yyyy">
                                <div class="help-block">if the person is still employed, please put today's date</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Reason for Leaving (if any)</div>
                            <div class="col-lg-7">
                                <textarea name="reason_for_leaving" class="form-control" rows="2"></textarea>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Would you re-employ?</div>
                            <div class="col-lg-7">
                                <textarea name="re-employ" class="form-control" rows="2"></textarea>
                            </div>
                        </div>

                    </div>
                    <hr />
                    @if (! empty($settings))
                        @include('references.settings')
                    @endif
                </div>
            </div>

            <div class="panel-footer">
                <button type="submit" class="btn btn-lg btn-success btn-lg">Submit Reference</button>
                <button type="reset" class="btn btn-lg btn-default btn-lg">Reset</button>

                <div class="pull-right">
                    <button class="btn btn-lg btn-danger">Cancel</button>
                </div>
            </div>

        </div>
        {!! Form::close() !!}
    </div>
</div>

@include('partials/footer')
<a href="#0" class="cd-top" data-toggle="tooltip" data-placement="top" title="Back to Top">Top</a>

<script type="text/javascript">
    $(document).ready(function () {

        //"back to top" link
        // browser window scroll (in pixels) after which the "back to top" link is shown
        var offset = 300,
        //browser window scroll (in pixels) after which the "back to top" link opacity is reduced
                offset_opacity = 1200,
        //duration of the top scrolling animation (in ms)
                scroll_top_duration = 700,
        //grab the "back to top" link
                $back_to_top = $('.cd-top');

        //hide or show the "back to top" link
        $(window).scroll(function(){
            ( $(this).scrollTop() > offset ) ? $back_to_top.addClass('cd-is-visible') : $back_to_top.removeClass('cd-is-visible cd-fade-out');
            if( $(this).scrollTop() > offset_opacity ) {
                $back_to_top.addClass('cd-fade-out');
            }
        });

        //smooth scroll to top
        $back_to_top.on('click', function(event){
            event.preventDefault();
            $('body,html').animate({
                        scrollTop: 0 ,
                    }, scroll_top_duration
            );
        });

    });
</script>
</body>
</html>