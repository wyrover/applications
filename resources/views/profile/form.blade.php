@extends('partials/layout')
@section('meta_title')
    Profile
@endsection
@section('title')
    Profile
@endsection
@section('content')

    {!! Form::open(['url' => '/profile/', 'class' => 'form-horizontal', 'files' => true]) !!}
        <input type="hidden" name="user_id" value="{!! $user->id !!}">
        <div class="form-group">
            <div class="col-sm-2">Name</div>
            <div class="col-lg-5">
                <input type="text" name="name" class="form-control" value="{!! $user->name !!}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">Email</div>
            <div class="col-lg-5">
                <input type="text" name="email" class="form-control" value="{!! $user->email !!}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">Username</div>
            <div class="col-lg-5">
                <input type="text" name="username" class="form-control" value="{!! $user->username !!}">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">Password</div>
            <div class="col-lg-5">
                <input type="password" name="password" class="form-control" value="" placeholder="Leave blank for unchanged" autocomplete="off" autofocus>
                <div class="help-block">Leave blank for unchanged</div>
            </div>
        </div>
    
        <hr />

        <label>Company Info</label>

        <div class="form-group">
            <div class="col-sm-2">Company Name</div>
            <div class="col-lg-5">
                <input type="text" name="company_name" class="form-control" value="{!! $company->name !!}" autocomplete="off">
            </div>
        </div>
    
        <div class="form-group">
            <div class="col-sm-2">Description</div>
            <div class="col-lg-5">
                <input type="text" name="company_description" class="form-control" value="{!! $company->description !!}" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">Phone</div>
            <div class="col-lg-5">
                <input type="text" name="company_phone" class="form-control" value="{!! $company->phone !!}" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">Email</div>
            <div class="col-lg-5">
                <input type="text" name="company_email" class="form-control" value="{!! $company->email !!}" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">Address1</div>
            <div class="col-lg-5">
                <input type="text" name="company_address" class="form-control" value="{!! $company->address1 !!}" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">Address2</div>
            <div class="col-lg-5">
                <input type="text" name="company_address2" class="form-control" value="{!! $company->address2 !!}" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">City</div>
            <div class="col-lg-5">
                <input type="text" name="company_city" class="form-control" value="{!! $company->city !!}" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">Postcode</div>
            <div class="col-lg-5">
                <input type="text" name="company_postcode" class="form-control" value="{!! $company->postcode !!}" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-2">Logo</div>
            <div class="col-lg-5">
                <span class="btn btn-primary btn-file">Browse... {!! Form::file('logo') !!}</span>
                <div class="help-block">Uploading a new logo will overwrite the current</div>
            </div>
        </div>

        <div class="form-group">
          <div class="col-lg-3">
             <button class="btn btn-success btn-lg">Update Profile</button>
          </div>
        </div>

    {!! Form::close() !!}

@endsection