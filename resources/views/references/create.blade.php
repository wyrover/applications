@extends('partials/layout')
@section('meta_title')
    New Reference Request
@endsection
@section('title')
    New Reference Request
@endsection
@section('content')

{!! Form::open(['url' => '/references/new', 'class' => 'form-horizontal']) !!}
<div class="col-md-12">
    <h5>Personal Details</h5>

    <div class="form-group">
        <div class="col-sm-3">First Name</div>
        <div class="col-lg-7">
            <input type="text" name="first_name" class="form-control" value="" autocomplete="off">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-3">Middle Names</div>
        <div class="col-lg-7">
            <input type="text" name="middle" class="form-control" value="" autocomplete="off">
        </div>
    </div>

    <div class="form-group">
        <div class="col-sm-3">Surname</div>
        <div class="col-lg-7">
            <input type="text" name="surname" class="form-control" value="" autocomplete="off">
        </div>
    </div>

</div>

<div class="col-md-12">
    <hr />
    <h5>Reference Details</h5>

    <div class="col-md-6">
        <label>First Referee</label>
        
        <div class="form-group">
            <div class="col-sm-3">Name</div>
            <div class="col-lg-7">
                <input type="text" name="name" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-3">Company Name</div>
            <div class="col-lg-7">
                <input type="text" name="company_name" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-3">Email</div>
            <div class="col-lg-7">
                <input type="text" name="email" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-3">Relationship</div>
            <div class="col-lg-7">
                <input type="text" name="relationship" class="form-control" value="" autocomplete="off">
            </div>
        </div>
        
        <div class="form-group">
            <div class="col-sm-3">Is this your previous /current employer?</div>
            <div class="col-lg-7">
                <select name="employer" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">Can we contact this reference?</div>
            <div class="col-lg-7">
                <select name="contact" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
        
    </div>

    <div class="col-md-6">
        <label>Second Referee</label>

        <div class="form-group">
            <div class="col-sm-3">Name</div>
            <div class="col-lg-7">
                <input type="text" name="name2" class="form-control" value="" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">Company Name</div>
            <div class="col-lg-7">
                <input type="text" name="company_name2" class="form-control" value="" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">Email</div>
            <div class="col-lg-7">
                <input type="text" name="emailtwo" class="form-control" value="" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">Relationship</div>
            <div class="col-lg-7">
                <input type="text" name="relationship2" class="form-control" value="" autocomplete="off">
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">Is this your previous /current employer?</div>
            <div class="col-lg-7">
                <select name="employer2" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>

        <div class="form-group">
            <div class="col-sm-3">Can we contact this reference?</div>
            <div class="col-lg-7">
                <select name="contact2" class="form-control">
                    <option value="Yes">Yes</option>
                    <option value="No">No</option>
                </select>
            </div>
        </div>
        
    </div>

</div>

<div class="form-group">
  <div class="col-lg-3">
     <button class="btn btn-successbtn-lg">Submit Request</button>
      <a href="/references" class="btn btn-danger btn-lg">Cancel</a>

  </div>
</div>

{!! Form::close() !!}
@endsection