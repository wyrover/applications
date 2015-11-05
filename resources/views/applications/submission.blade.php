<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>Application Submission</title>

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
    <div class="row">
    <div class="col-lg-11 col-md-10 col-sm-11 col-xs-5">
         <p>Please fill out this application as accurately as possible make sure to fill as many boxes as you can.<br />
            Fields marked with <span class="text-danger">*</span> are required.
         </p>
        {!! Form::open(['url' => 'application', 'class' => 'form-horizontal']) !!}

            <input type="hidden" name="company_id" value="{!! $company->id !!}">
            <input type="hidden" name="company_name_for_submission" value="{!! $company->name !!}">
            <input type="hidden" name="code" value="{!! str_random(40) !!}">
            <input type="hidden" name="settings_id" value="{!! $field->id !!}">

            <div class="panel panel-default">
                <div class="panel-heading">Personal Details</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('first_name') ? 'has-error' : '' }}">
                            <div class="col-sm-4">First Name <span class="text-danger">*</span></div>
                            <div class="col-lg-7">
                                <input type="text" name="first_name" class="form-control" value="{!! old('first_name') !!}">
                                {!! $errors->first('first_name', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Middle Name(s)</div>
                            <div class="col-lg-7">
                                <input type="text" name="middle_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('surname') ? 'has-error' : '' }}">
                            <div class="col-sm-4">Surname <span class="text-danger">*</span></div>
                            <div class="col-lg-7">
                                <input type="text" name="surname" class="form-control" value="{!! old('surname') !!}">
                                {!! $errors->first('surname', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('address_line1') ? 'has-error' : '' }}">
                            <div class="col-sm-4">Address Line 1 <span class="text-danger">*</span></div>
                            <div class="col-lg-7">
                                <input type="text" name="address_line1" class="form-control" value="{!! old('address_line1') !!}">
                                {!! $errors->first('address_line1', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Address Line 2</div>
                            <div class="col-lg-7">
                                <input type="text" name="address_line2" class="form-control" value="{!! old('address_line2') !!}">
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('city') ? 'has-error' : '' }}">
                            <div class="col-sm-4">City <span class="text-danger">*</span></div>
                            <div class="col-lg-7">
                                <input type="text" name="city" class="form-control" value="{!! old('city') !!}">
                                {!! $errors->first('city', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                        <div class="form-group {{ $errors->has('postcode') ? 'has-error' : '' }}">
                            <div class="col-sm-4">Postcode <span class="text-danger">*</span></div>
                            <div class="col-lg-7">
                                <input type="text" name="postcode" class="form-control" value="{!! old('postcode') !!}">
                                {!! $errors->first('postcode', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>

                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('telephone') ? 'has-error' : '' }}">
                            <div class="col-sm-4">Telephone <span class="text-danger">*</span></div>
                            <div class="col-lg-7">
                                <input type="text" name="telephone" class="form-control" value="{!! old('telephone') !!}">
                                {!! $errors->first('telephone', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('mobile') ? 'has-error' : '' }}">
                            <div class="col-sm-4">Mobile <span class="text-danger">*</span></div>
                            <div class="col-lg-7">
                                <input type="text" name="mobile" class="form-control" value="{!! old('mobile') !!}">
                                {!! $errors->first('mobile', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('email') ? 'has-error' : '' }}">
                            <div class="col-sm-4">Email <span class="text-danger">*</span></div>
                            <div class="col-lg-7">
                                <input type="text" name="email" class="form-control" value="{!! old('email') !!}">
                                {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group {{ $errors->has('ni_number') ? 'has-error' : '' }}">
                            <div class="col-sm-4">National Insurance Number <span class="text-danger">*</span></div>
                            <div class="col-lg-7">
                                <input type="text" name="ni_number" class="form-control" value="{!! old('ni_number') !!}" placeholder="Example: AB123456C">
                                {!! $errors->first('ni_number', '<span class="help-block">:message</span>') !!}
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Transport</div>
                <div class="panel-body">
                    <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-sm-4">Are you a driver?</div>
                        <div class="col-lg-7">
                            <select name="driver" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No">No</option>
                            </select>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">Please list any endorsements? (if any)</div>
                        <div class="col-lg-7">
                            <textarea name="endorsements" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-4">What kind of vehicle have you got access to?</div>
                            <div class="col-lg-7">
                                <select name="vehicle_access" class="form-control">
                                    <option value="Car">Car</option>
                                    <option value="Motorbike">Motorbike</option>
                                    <option value="Other">Other</option>
                                    <option value="None">None</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Permission to work in the UK</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-4">Do you have the right to work in the UK?</div>
                            <div class="col-lg-7">
                                <select name="right_to_work" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Are you able to evidence that you have  the right to work in the uk?</div>
                            <div class="col-lg-7">
                                <select name="evidence_right_to_work" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-4">When is your visa valid until?</div>
                            <div class="col-lg-7">
                                <input type="text" name="visa_valid_to" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Comments</div>
                            <div class="col-lg-7">
                                <textarea name="comments" class="form-control" rows="2"></textarea>
                            </div>
                        </div>
                    </div>
                    <hr />
                </div>
                <div class="panel-footer">
                    <p>In line with UKBA guidance on the prevention of illegal working we will need to verify and take a copy of your original ID documentation as evidence of your right to work in the UK if you are to be engaged by the company for temporary/permanent work.</p>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Education</div>
                <div class="panel-body">

                        <div class="form-group">
                            <div class="col-sm-4">From GCSE or equivalent to degree level in chronological order
                                Postgraduate education or study or any other professional qualifications</div>
                            <div class="col-lg-7">
                                <textarea name="education" class="form-control" rows="6"></textarea>
                            </div>
                        </div>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Work Experience</div>
                <div class="panel-body">
                <p>Please give details of your last three jobs. Any relevant posts held before then may also be mentioned. Please begin with your present or most recent position and then work chronologically backwards, we need 5 years work history, if you have had any gaps then please indicate.</p><hr />
                    <div class="col-md-6">
                        <legend>Work Experience 1</legend>
                        <div class="form-group">
                            <div class="col-sm-4">Employer Name</div>
                            <div class="col-lg-7">
                                <input type="text" name="employer_name" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Job Title</div>
                            <div class="col-lg-7">
                                <input type="text" name="job_title" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Start Date</div>
                            <div class="col-lg-7">
                                <input type="date" name="employer_start_date" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">End Date</div>
                            <div class="col-lg-7">
                                <input type="date" name="employer_end_date" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Description of duties and responsibilities and reason for leaving
                            </div>
                            <div class="col-lg-7">
                                <textarea name="employer_responsibilities" class="form-control" row="3"></textarea>
                            </div>
                        </div>

                        <legend>Work Experience 3</legend>
                        <div class="form-group">
                            <div class="col-sm-4">Employer Name</div>
                            <div class="col-lg-7">
                                <input type="text" name="employer_name3" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Job Title</div>
                            <div class="col-lg-7">
                                <input type="text" name="job_title3" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Start Date</div>
                            <div class="col-lg-7">
                                <input type="date" name="employer_start_date3" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">End Date</div>
                            <div class="col-lg-7">
                                <input type="date" name="employer_end_date3" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Description of duties and responsibilities and reason for leaving
                            </div>
                            <div class="col-lg-7">
                                <textarea name="employer_responsibilities3" class="form-control" row="3"></textarea>
                            </div>
                        </div>

                    </div>
                    <div class="col-md-6">
                        <legend>Work Experience 2</legend>
                        <div class="form-group">
                            <div class="col-sm-4">Employer Name</div>
                            <div class="col-lg-7">
                                <input type="text" name="employer_name2" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Job Title</div>
                            <div class="col-lg-7">
                                <input type="text" name="job_title2" class="form-control">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Start Date</div>
                            <div class="col-lg-7">
                                <input type="date" name="employer_start_date2" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">End Date</div>
                            <div class="col-lg-7">
                                <input type="date" name="employer_end_date2" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-sm-4">Description of duties and responsibilities and reason for leaving
                            </div>
                            <div class="col-lg-7">
                                <textarea name="employer_responsibilities2" class="form-control" row="3"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-4">Any gaps in your employment ?</div>
                            <div class="col-lg-7">
                                <textarea name="employment_gaps" class="form-control" rows="4"></textarea>
                            </div>
                        </div>
                    </div>

                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Health Information</div>
                <div class="panel-body">
                    <div class="form-group">
                        <div class="col-sm-7">Do you have any health issues or a disability relevant which may make it difficult for you to carry out functions which are essential for the role you seek?</div>
                        <div class="col-lg-4">
                            <select name="health_info" class="form-control">
                                <option value="Yes">Yes</option>
                                <option value="No" selected>No</option>
                            </select>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Criminal Convictions</div>
                <div class="panel-body">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="col-sm-4">Do you have any unspent* criminal convictions?</div>
                            <div class="col-lg-7">
                                <select name="criminal_convictions" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No" selected>No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <p>* Failure to declare a conviction may require us to exclude you from our register or terminate an assignment if the offence is not declared but later comes to light.</p>
                        <div class="form-group">
                            <div class="col-sm-4">Comments</div>
                            <div class="col-lg-7">
                                <textarea name="convictions_comments" class="form-control" rows="5"></textarea>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">How can we contact you?</div>
              <div class="panel-body">
                  <div class="form-group">
                      <div class="col-lg-5">
                          <div class="col-md-2"><label>SMS</label><input type="checkbox" name="contactable" value="sms"></div>
                          <div class="col-md-2"><label>Email</label><input type="checkbox" name="contactable" value="email"></div>
                          <div class="col-md-2"><label>Phone</label><input type="checkbox" name="contactable" value="phone"></div>
                      </div>
                  </div>
              </div>
            </div>

            <div class="panel panel-default">
              <div class="panel-heading">Next of Kin</div>
              <div class="panel-body">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-sm-4">Relationship to you</div>
                        <div class="col-lg-7">
                            <input type="text" name="next_of_kin_relationship" class="form-control">
                        </div>
                    </div>
                    <div class="form-group">
                        <div class="col-sm-4">Name</div>
                        <div class="col-lg-7">
                            <input type="text" name="next_of_kin_name" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">Address</div>
                        <div class="col-lg-7">
                            <textarea name="next_of_kin_address" class="form-control" rows="2"></textarea>
                        </div>
                    </div>
                </div>

                <div class="col-md-6">
                    <div class="form-group">
                        <div class="col-sm-4">Telephone</div>
                        <div class="col-lg-7">
                            <input type="text" name="next_of_kin_telephone" class="form-control">
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-4">Mobile</div>
                        <div class="col-lg-7">
                            <input type="text" name="next_of_kin_mobile" class="form-control">
                        </div>
                    </div>

                </div>
              </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Reference Details</div>
                <div class="panel-body">
                    <p>Please give details of two referees, one of whom must be your current or most recent employer or, if this is an application for your first job, your school teacher or higher or further education lecturer. Neither referee should be a relative.</p><hr />
                    <div class="col-md-6">
                        <legend>First Referee</legend>
                        <div class="form-group">
                            <div class="col-sm-4">Name</div>
                            <div class="col-lg-7">
                                <input type="text" name="referee_name" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Company Name</div>
                            <div class="col-lg-7">
                                <input type="text" name="referee_company" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Email</div>
                            <div class="col-lg-7">
                                <input type="text" name="referee_email" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Relationship</div>
                            <div class="col-lg-7">
                                <input type="text" name="referee_relationship" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Start Date</div>
                            <div class="col-lg-7">
                                <input type="date" name="referee_start_date" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">End Date</div>
                            <div class="col-lg-7">
                                <input type="date" name="referee_end_date" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Is this your previous /current employer?</div>
                            <div class="col-lg-7">
                                <select name="referee_current_employer" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Can we contact this reference?</div>
                            <div class="col-lg-7">
                                <select name="referee_contact" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-6">
                        <legend>Second Referee</legend>
                        <div class="form-group">
                            <div class="col-sm-4">Name</div>
                            <div class="col-lg-7">
                                <input type="text" name="referee_name2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Company Name</div>
                            <div class="col-lg-7">
                                <input type="text" name="referee_company2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Email</div>
                            <div class="col-lg-7">
                                <input type="text" name="referee_email2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Relationship</div>
                            <div class="col-lg-7">
                                <input type="text" name="referee_relationship2" class="form-control">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Start Date</div>
                            <div class="col-lg-7">
                                <input type="date" name="referee_start_date2" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">End Date</div>
                            <div class="col-lg-7">
                                <input type="date" name="referee_end_date2" class="form-control" placeholder="dd/mm/yyyy">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Is this your previous /current employer?</div>
                            <div class="col-lg-7">
                                <select name="referee_current_employer2" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-sm-4">Can we contact this reference?</div>
                            <div class="col-lg-7">
                                <select name="referee_contact2" class="form-control">
                                    <option value="Yes">Yes</option>
                                    <option value="No">No</option>
                                </select>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @if (count($field))
                @include('applications.custom')
            @endif

            <div class="panel panel-default">
                <div class="panel-heading">Candidate Declaration</div>
                <div class="panel-body">
                    <p>I hereby confirm that the information given is true and correct. I consent to my personal data and CV being forwarded to clients. I consent to references being passed onto potential employers. If, during the course of a temporary assignment, the Client wishes to employ me direct, I acknowledge that we will be entitled either to charge the client an introduction/transfer fee, or to agree an extension of the hiring period with the Client (after which I may be employed by the Client without further charge being applicable to the Client).</p>
                </div>
            </div>

            <div class="panel panel-default">
                <div class="panel-heading">Data Protection Statement</div>
                <div class="panel-body">
                    <p>The information that you provide on this form and on any CV given will be used by us to provide you work finding services. In providing this service to you, you consent to your personal data being included on a computerised database and consent to us transferring your personal details to our clients. We may check the information collected, with third parties or with other information held by us. We may also use or pass to certain third parties information to prevent or detect crime, to protect public funds, or in other way permitted or required by law.</p>
                    <hr />
                    <div class="form-group">
                        <div class="col-sm-2 {{ $errors->has('accept_data_protection') ? 'has-error' : '' }}">I accept this statement</div>
                        <div class="col-lg-2">
                            <input type="checkbox" name="accept_data_protection" value="1">
                            {!! $errors->first('accept_data_protection', '<span class="help-block">You must check that you accept the above statement.</span>') !!}
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2">Date</div>
                        <div class="col-lg-5">
                            <input type="text" value="{!! date("d/m/y") !!}" class="form-control" readonly>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-2 {{ $errors->has('signed_by') ? 'has-error' : '' }}">Digital Signature (full name) <span class="text-danger">*</span></div>
                        <div class="col-lg-5">
                            <input type="text" class="form-control" name="signed_by">
                            {!! $errors->first('signed_by', '<span class="help-block">You must enter your full name as a digital signature</span>') !!}

                        </div>
                    </div>

                </div>
            </div>
            <button class="btn btn-success btn-lg" type="submit">Submit</button><br /><br />
        {!! Form::close() !!}
    </div>
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