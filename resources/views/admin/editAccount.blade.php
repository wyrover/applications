@extends('admin.layout')
@section('content')

    <div class="panel panel-default">
      <div class="panel-heading">Edit {!! $user->name !!}</div>
      <div class="panel-body">

          {!! Form::model($user, ['method' => 'PUT', 'url' => ['/admin/account/update', $user->id], 'class' => 'form-horizontal']) !!}
          <legend>Company Details</legend>
          <div class="form-group">
              <div class="col-sm-2">Company Name</div>
              <div class="col-lg-7">
                  <input type="text" name="company_name" class="form-control" value="{!! $user->company()->first()->name !!}">
                  <div class="help-block">This will also serve as the custom domain.<br /><code>companyname.example.com</code></div>
              </div>
          </div>

          <div class="form-group">
              <div class="col-sm-2">Company Email</div>
              <div class="col-lg-7">
                  <input type="text" name="company_email" class="form-control" value="{!! $user->company()->first()->email !!}">
              </div>
          </div>

          <div class="form-group">
              <div class="col-sm-2">Address Line 1</div>
              <div class="col-lg-7">
                  <input type="text" name="address1" class="form-control" value="{!! $user->company()->first()->address1 !!}">
              </div>
          </div>

          <div class="form-group">
              <div class="col-sm-2">Address Line 2</div>
              <div class="col-lg-7">
                  <input type="text" name="address2" class="form-control" value="{!! $user->company()->first()->address2 !!}">
              </div>
          </div>

          <div class="form-group">
              <div class="col-sm-2">City</div>
              <div class="col-lg-7">
                  <input type="text" name="city" class="form-control" value="{!! $user->company()->first()->city !!}">
              </div>
          </div>

          <div class="form-group">
              <div class="col-sm-2">Postcode</div>
              <div class="col-lg-7">
                  <input type="text" name="postcode" class="form-control" value="{!! $user->company()->first()->postcode !!}">
              </div>
          </div>

          <legend>Personal Details</legend>

          <div class="form-group">
              <div class="col-sm-2">Name</div>
              <div class="col-lg-7">
                  <input type="text" name="name" class="form-control" value="{!! $user->name !!}">
              </div>
          </div>

          <div class="form-group">
              <div class="col-sm-2">Email</div>
              <div class="col-lg-7">
                  <input type="text" name="email" class="form-control" value="{!! $user->email !!}">
                  <div class="help-block">Used for password recovery</div>
              </div>
          </div>

          <div class="form-group">
              <div class="col-sm-2">Username</div>
              <div class="col-lg-7">
                  <input type="text" name="username" class="form-control" value="{!! $user->username !!}">
                  <div class="help-block">Used to login</div>
              </div>
          </div>

          <div class="form-group">
              <div class="col-sm-2">Password</div>
              <div class="col-lg-7">
                  <input type="password" name="password" class="form-control">
              </div>
          </div>

          <div class="form-group">
            <div class="col-lg-3">
               <button class="btn btn-success">Update</button>
            </div>
          </div>


          {!! Form::close() !!}
      </div>
    </div>

@endsection