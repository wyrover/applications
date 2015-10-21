<footer>
    <div class="container">
        <div class="row">
            <div class="col-xs-6 col-md-4">&copy; {!! date('Y') !!}</div>
            <div class="col-xs-6 col-md-4"></div>
            <div class="col-xs-6 col-md-4 text-right"><button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">Support</button></div>
        </div>
    </div>
</footer>

<!-- Modal -->
<div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title" id="myModalLabel">Support Request</h4>
            </div>
            <div class="modal-body">
                {!! Form::open(['url' => 'support', 'class' => 'form-horizontal']) !!}

                <div class="form-group">
                    <div class="col-sm-2">Name</div>
                    <div class="col-lg-6">
                        <input type="text" name="name" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">Tel</div>
                    <div class="col-lg-6">
                        <input type="text" name="tel" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">Email</div>
                    <div class="col-lg-6">
                        <input type="text" name="email" class="form-control" value="">
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-sm-2">Message</div>
                    <div class="col-lg-7">
                        <textarea name="message" rows="10" class="form-control"></textarea>
                    </div>
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Send</button>
                {!! Form::close() !!}
            </div>
        </div>
    </div>
</div><!-- /End Modal Window -->

<!-- javascript/jQuery -->
<script src="/js/jquery-1.11.1.js"></script>
<script src="/js/bootstrap.js"></script>
<script src="/js/sweetalert.min.js"></script>
<script src="/js/moment/moment.js"></script>

@include('flash')

<!--[if lt IE 9]>
<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
<script src="/js/html5shiv.min.js"></script>
<script src="/js/respond.min.js"></script>
<![endif]-->

<script type="text/javascript">
    $(document).ready(function() {
        $("body").tooltip({ selector: '[data-toggle=tooltip]' });
    });
</script>

@yield('endjs')