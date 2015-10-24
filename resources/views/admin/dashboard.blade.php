@extends('admin.layout')
@section('content')

    <div class="panel panel-default">
      <div class="panel-heading">Hi {!! Auth::user()->name !!},</div>
      <div class="panel-body">

          <div class="panel-heading">
              <h4>All Accounts</h4>
              <button class="btn btn-sm btn-primary pull-right" data-toggle="modal" data-target="#createModal">Create Account</button><br />
          </div>
          <div style="margin: 10px 0px 0px 0px;"></div>
          <div class="table-responsive">
          <table class="table table-striped table-bordered">
              <thead>
                    <tr>
                        <th>Name</th>
                        <th>Company</th>
                        <th>Address</th>
                        <th>City</th>
                        <th>Postcode</th>
                        <th>Phone</th>
                        <th>Actions</th>
                    </tr>
              </thead>

              <tbody>
                @foreach($accounts as $account)
                    <tr>
                        <td>{!! $account->name !!}</td>
                        <td>{!! $account->company()->first()->name !!}</td>
                        <td>{!! $account->company()->first()->address1 !!}, {!! $account->company()->first()->address2 !!}</td>
                        <td>{!! $account->company()->first()->city !!}</td>
                        <td>{!! $account->company()->first()->postcode !!}</td>
                        <td>{!! $account->company()->first()->phone !!}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <a href="/admin/account/{!! $account->id !!}/edit" class="btn btn-sm btn-warning">Edit</a>
                                <a href="/admin/account/{!! $account->id !!}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove this?')">Delete</a>
                            </div>
                        </td>
                    </tr>
                @endforeach
              </tbody>
          </table>
              {!! $accounts->render() !!}
          </div>
      </div>
    </div>

    <!-- Modal -->
    <div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="createModal" id="createModal">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <h4 class="modal-title" id="myModalLabel">Create Account</h4>
                </div>
                {!! Form::open(['url' => 'admin/account', 'class' => 'form-horizontal']) !!}
                    <div class="modal-body">

                        <legend>Company Details</legend>
                        <div class="form-group">
                            <div class="col-sm-2">Company Name</div>
                            <div class="col-lg-7">
                                <input type="text" name="company_name" class="form-control" value="{!! old('') !!}">
                                <div class="help-block">This will also serve as the custom domain.<br /><code>companyname.madesimpleltd.co.uk</code></div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">Company Email</div>
                            <div class="col-lg-7">
                                <input type="text" name="company_email" class="form-control" value="{!! old('') !!}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">Address Line 1</div>
                            <div class="col-lg-7">
                                <input type="text" name="address1" class="form-control" value="{!! old('') !!}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">Address Line 2</div>
                            <div class="col-lg-7">
                                <input type="text" name="address2" class="form-control" value="{!! old('') !!}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">City</div>
                            <div class="col-lg-7">
                                <input type="text" name="city" class="form-control" value="{!! old('') !!}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">Postcode</div>
                            <div class="col-lg-7">
                                <input type="text" name="postcode" class="form-control" value="{!! old('') !!}">
                            </div>
                        </div>

                        <legend>Personal Details</legend>

                        <div class="form-group">
                            <div class="col-sm-2">Name</div>
                            <div class="col-lg-7">
                                <input type="text" name="name" class="form-control" value="{!! old('') !!}">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">Email</div>
                            <div class="col-lg-7">
                                <input type="text" name="email" class="form-control" value="{!! old('') !!}">
                                <div class="help-block">Used for password recovery</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">Username</div>
                            <div class="col-lg-7">
                                <input type="text" name="username" class="form-control" value="{!! old('') !!}">
                                <div class="help-block">Used to login</div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-2">Password</div>
                            <div class="col-lg-7">
                                <input type="password" name="password" class="form-control" value="{!! old('') !!}">
                            </div>
                        </div>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Save changes</button>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </div>

@endsection