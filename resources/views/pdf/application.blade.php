<html>
<head>
    <style>
        @page { margin: 0px; }
        body { margin: 0px; }
        body {
            margin: 20px; font-family: Arial, Helvetica, sans-serif;
        }
        html *
        {
            font-size: 14px !important;
            font-family: Arial, Helvetica, sans-serif;
        }
        h1 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 30px;
            color: #666;
        }
        h2 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 20px; text-transform: uppercase;
            margin: -30px -20px 20px -20px; padding: 10px;
        }
        h3 {
            font-family: Arial, Helvetica, sans-serif;
            font-size: 21px;
            padding: 0px 0px 10px 0px;
            text-transform: uppercase;
        }
        table.header{
            font-size: 12px;
        }

        table.header td{
            vertical-align: top;
        }

        table.header td.address{
            min-width: 120px;
            margin: 0px 0px 0px 70px;
        }
        table.header td.contact{
            min-width: 120px;
            margin: 0px 0px 0px 90px;
        }
        table.title{
            margin: 10px 0 20px 320px; padding: 8px; color: #999999;
        }

        table.title h1{ margin: 0; padding: 0; text-transform: uppercase; font-size: 21px!important; }

        table.title p.submitted{
            font-size: 11px; margin: 2px 0 0 24px;
        }
        ul.column{ text-align: right; vertical-align: top; display: inline-block; padding: 0; list-style-type: none; height: 500px; width: 100%; }
        ul.column.full{ width: 98%; margin: 0 2%; }
        ul.column li{ margin: 0 0 20px 0; width: 50%; display: inline-block; padding: 0; float: left; }
        table.sheet{ margin: 20px 0 0 0; }
        table.sheet tr:nth-child(odd)       { background-color:#eee; }
        table.sheet tr:nth-child(even)      { background-color:#fff; }
        hr { border: 1px solid #F8F8F8; padding: 0px;}
        .address { font-size: 11px; }
        .contact { font-size: 11px; }
        .we2 { margin: 0px 0px 0px 40px; }
        .no-answer { color: #999999; font-size: 12px; font-style: italic; }
    </style>
</head>
<body>

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="left">
            @if (! empty($ref->company()->first()->logo))
                <img src="uploads/{!! $ref->company()->first()->logo !!}" width="190">
            @endif
        </td>
        <td align="left" class="address">
            {!! $ref->company()->first()->address1 !!}<br />
            {!! $ref->company()->first()->address2 !!}<br />
            {!! $ref->company()->first()->city !!}<br />
            {!! $ref->company()->first()->postcode !!}<br />

        </td>
        <td align="left" class="contact">
            {!! $ref->company()->first()->phone !!}<br />
            {!! $ref->company()->first()->email !!}<br />
            {!! $ref->company()->first()->website !!}<br />
        </td>
    </tr>
</table>
<br />
<table width="100%" border="0" cellspacing="0" cellpadding="0" class="title">
    <tr>
        <td align="center">
            <h1>Job Application</h1>
            <p class="submitted">Submitted on {!! $ref->application->created_at->toFormattedDateString() !!}</p>
        </td>
    </tr>
</table>
<br />
<hr />
<br />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <h3>Personal Details</h3>
            First Name: <strong>{!! $ref->application->first_name !!}</strong><br />
            @if (! empty($ref->application->middle_name)) Middle Names: <strong>{!! $ref->application->middle_name !!}</strong> <br />@endif
            Surname: <strong>{!! $ref->application->surname !!}</strong><br />
            Address Line 1: <strong>{!! $ref->application->address_line1 !!}</strong><br />
            Address Line 2: <strong>{!! $ref->application->address_line2 !!}</strong><br />
            City: <strong>{!! $ref->application->city !!}</strong><br />
            Postcode: <strong>{!! $ref->application->postcode !!}</strong><br />

        </td>
        <td>
            Telephone: <strong>{!! $ref->application->telephone !!}</strong><br />
            Mobile: <strong>{!! $ref->application->mobile !!}</strong><br />
            Email: <strong>{!! $ref->application->email !!}</strong><br />
            National Insurance Number: <strong>{!! $ref->application->ni_number !!}</strong><br />
        </td>
    </tr>
</table>

<br />
<hr />
<br />

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td>
            <h3>Education</h3>
            {!! nl2br($ref->application->education) !!}
        </td>
    </tr>
</table>

<br />
<hr />
<br />

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <h3>Work Experience</h3>
            Job Title: <strong>{!! $ref->application->job_title !!}</strong><br />
            Start Date: @if (! empty($ref->application->employer_start_date)) <strong>{!! $ref->application->employer_start_date !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            End Date: @if (! empty($ref->application->employer_end_date)) <strong>{!! $ref->application->employer_end_date !!}</strong> @else <span class="no-answer">No answer given</span> @endif

        </td>
        <td>
            <h4>Work Experience 1</h4>
            Job Duties: {!! nl2br($ref->application->employer_responsibilities) !!}
        </td>

    </tr>
    <tr>
        <td>
            Job Title: <strong>{!! $ref->application->job_title2 !!}</strong><br />
            Start Date: @if (! empty($ref->application->employer_start_date2)) <strong>{!! $ref->application->employer_start_date2 !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            End Date: @if (! empty($ref->application->employer_end_date2)) <strong>{!! $ref->application->employer_end_date2 !!}</strong> @else <span class="no-answer">No answer given</span> @endif

        </td>
        <td>
            <h4>Work Experience 2</h4>
            Job Duties: {!! nl2br($ref->application->employer_responsibilities2) !!}
        </td>
    </tr>
    <tr>
        <td>
            Job Title: <strong>{!! $ref->application->job_title3 !!}</strong><br />
            Start Date: @if (! empty($ref->application->employer_start_date3)) <strong>{!! $ref->application->employer_start_date3 !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            End Date: @if (! empty($ref->application->employer_end_date3)) <strong>{!! $ref->application->employer_end_date3 !!}</strong> @else <span class="no-answer">No answer given</span> @endif

        </td>
        <td>
            <h4>Work Experience 3</h4>
            Job Duties:  {!! nl2br($ref->application->employer_responsibilities3) !!}
        </td>
    </tr>
</table>

<br />
<hr />
<br />

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <h3>Health Information</h3>
            Do you have any health issues or a disability relevant which
            may make it difficult for you to carry out functions which are
            essential for the role you seek?: <strong>{!! nl2br($ref->application->health_info) !!}</strong>
        </td>
        <td></td>
    </tr>
</table>

<br />
<hr />
<br />

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <h3>Transportation</h3>
            Are you a driver? <strong>{!! $ref->application->driver !!}</strong>
        </td>
    </tr>
    <tr>
        <td>Do you have any endorsements? <strong>{!! $ref->application->endorsements !!}</strong></td>
        <td>Vehicle Access: <strong>{!! $ref->application->vehicle_access !!}</strong></td>
    </tr>
</table>

<br />
<hr />
<br />

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <h3>Right to Work</h3>
            Do you have the right to work in the UK? <strong>{!! $ref->application->right_to_work !!}</strong>
        </td>
        <td>
            Have a valid Visa? <strong>{!! $ref->application->visa_valid_to !!}</strong><br />
            Comments: {!! nl2br($ref->application->comments) !!}
        </td>
    </tr>
    <tr>
        <td>Please explain evidence to show you have the right to work in the UK <strong>{!! $ref->application->evidence_right_to_work !!}</strong></td>
    </tr>
</table>

<br />
<hr />
<br />
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <h3>Employment Gaps</h3>
            <p>{!! nl2br($ref->application->employment_gaps) !!}</p>
        </td>
    </tr>
</table>

<br />
<hr />
<br />

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <h3>Criminal Convictions</h3>
            Do you have any unspent* criminal convictions?:  <strong>{!! nl2br($ref->application->criminal_convictions) !!}</strong><br />
            Comment Box: @if(! empty($ref->application->convictions_comments)) {!! nl2br($ref->application->convictions_comments) !!} @else <span class="no-answer">No answer given</span> @endif
        </td>
        <td></td>
    </tr>
</table>

<br />
<hr />
<br />

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <h3>How can we contact you</h3>
            How would you like to be contacted when shifts become available?  @if(! empty($ref->application->contactable)) <strong>{!! $ref->application->contactable !!}</strong>@else <span class="no-answer">No answer given</span> @endif
        </td>
        <td></td>
    </tr>
</table>

<br />
<hr />
<br />

<table width="100%" border="0" cellpadding="0" cellspacing="0">
    <tr>
        <td align="left">
            <h3>Next of Kin</h3>
            Relationship to you: @if(! empty($ref->application->next_of_kin_relationship)) <strong>{!! $ref->application->next_of_kin_relationship !!}</strong>  @else <span class="no-answer">No answer given</span> @endif<br />
            Name: @if(! empty($ref->application->next_of_kin_name)) <strong>{!! $ref->application->next_of_kin_name !!}</strong>  @else <span class="no-answer">No answer given</span> @endif<br />
            Address: @if(! empty($ref->application->next_of_kin_address)) <strong>{!! $ref->application->next_of_kin_address !!}</strong>  @else <span class="no-answer">No answer given</span> @endif
        </td>
        <td>
            Telephone: @if(! empty($ref->application->next_of_kin_telephone)) <strong>{!! $ref->application->next_of_kin_telephone !!}</strong>  @else <span class="no-answer">No answer given</span> @endif<br />
            Mobile: @if(! empty($ref->application->next_of_kin_mobile)) <strong>{!! $ref->application->next_of_kin_mobile !!}</strong>  @else <span class="no-answer">No answer given</span> @endif
        </td>
    </tr>
</table>

<br />
<hr />
<br />

<table width="100%" border="0" cellpadding="0" cellspacing="0">

    <tr>
        <td align="left">
            <h3>Reference Details</h3>
            Name: @if(! empty($refOne->referee_name)) <strong>{!! $refOne->referee_name !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Company Name: @if(! empty($refOne->referee_company )) <strong>{!! $refOne->referee_company !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Email Address: @if(! empty($refOne->referee_email )) <strong>{!! $refOne->referee_email !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Start Date: @if(! empty($refOne->referee_start_date )) <strong>{!! $refOne->referee_start_date !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            End Date: @if(! empty($refOne->referee_end_date )) <strong>{!! $refOne->referee_end_date !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />

        </td>
        <td>
            <h4>First Referee</h4>
            Relationship: @if(! empty( $refOne->referee_relationship)) <strong>{!! $refOne->referee_relationship!!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Is this your previous /current employer?: @if(! empty($refOne->referee_current_employer)) <strong>{!! $refOne->referee_current_employer !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Can we contact this reference?: @if(! empty($refOne->referee_contact)) <strong>{!! $refOne->referee_contact !!}</strong> @else <span class="no-answer">No answer given</span> @endif
        </td>
    </tr>
    <tr>
        <td align="left"><br /><br /><br/><br/><br/>
            Name: @if(! empty($refTwo->referee_name)) <strong>{!! $refTwo->referee_name !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Company Name: @if(! empty($refTwo->referee_company)) <strong>{!! $refTwo->referee_company !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Email Address: @if(! empty($refTwo->referee_email )) <strong>{!! $refTwo->referee_email !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Start Date: @if(! empty($refTwo->referee_start_date )) <strong>{!! $refTwo->referee_start_date !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Start Date: @if(! empty($refTwo->referee_end_date )) <strong>{!! $refTwo->referee_end_date !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />

        </td>
        <td><br />
            <h4>Second Referee</h4>
            Relationship: @if(! empty( $refTwo->referee_relationship)) <strong>{!! $refTwo->referee_relationship !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Is this your previous /current employer?: @if(! empty($refTwo->referee_current_employer)) <strong>{!! $refTwo->referee_current_employer !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Can we contact this reference?: @if(! empty($refTwo->referee_contact2)) <strong>{!! $refTwo->referee_contact2!!}</strong> @else <span class="no-answer">No answer given</span> @endif
        </td>
    </tr>

</table>
<br />
<hr />
<br />

<!-- Additonal Info -->
<table width="100%" border="0" cellpadding="0" cellspacing="0">
    @foreach($custom as $c)
    <tr>
        <td>
            <h3>Additional Information</h3>
            @if (! empty($settings->label) && $c->answer) {!! $settings->label !!}: <strong>{!! $c->answer !!}</strong><br /> @endif
            @if (! empty($settings->label2) && $c->answer2) {!! $settings->label2 !!}: <strong>{!! $c->answer2 !!}</strong><br /> @endif
            @if (! empty($settings->label3) && $c->answer3) {!! $settings->label3 !!}: <strong>{!! $c->answer3 !!}</strong><br /> @endif
            @if (! empty($settings->label4) && $c->answer4) {!! $settings->label4 !!}: <strong>{!! $c->answer4 !!}</strong><br /> @endif
            @if (! empty($settings->label5) && $c->answer5) {!! $settings->label5 !!}: <strong>{!! $c->answer5 !!}</strong><br /> @endif
            @if (! empty($settings->label6) && $c->answer6) {!! $settings->label6 !!}: <strong>{!! $c->answer6 !!}</strong><br /> @endif
            @if (! empty($settings->label7) && $c->answer7) {!! $settings->label7 !!}: <strong>{!! $c->answer7 !!}</strong><br /> @endif
            @if (! empty($settings->label8) && $c->answer8) {!! $settings->label8 !!}: <strong>{!! $c->answer8 !!}</strong><br /> @endif
            @if (! empty($settings->label9) && $c->answer9) {!! $settings->label9 !!}: <strong>{!! $c->answer9 !!}</strong><br /> @endif
            @if (! empty($settings->label10) && $c->answer10) {!! $settings->label10 !!}: <strong>{!! $c->answer10 !!}</strong><br /> @endif
        </td>
    </tr>
    @endforeach
</table>

<br />
<hr />
<br />

<table width="100%" border="0" cellpadding="0" cellspacing="0">
<tr>
    <td>
        <h3>Candidate Declaration</h3>
        I hereby confirm that the information given is true and correct. I consent to my personal data and CV being forwarded to clients. I consent to references being passed onto potential employers. If, during the course of a temporary assignment, the Client wishes to employ me direct, I acknowledge that we will be entitled either to charge the client an introduction/transfer fee, or to agree an extension of the hiring period with the Client (after which I may be employed by the Client without further charge being applicable to the Client).
    </td>
</tr>
<tr>
    <td><br />
        <h3>Data Protection Statement</h3>
        The information that you provide on this form and on any CV given will be used by us to provide you work finding services. In providing this service to you, you consent to your personal data being included on a computerised database and consent to us transferring your personal details to our clients. We may check the information collected, with third parties or with other information held by us. We may also use or pass to certain third parties information to prevent or detect crime, to protect public funds, or in other way permitted or required by law.<br /><br />
        <hr />
        I accept this statement: @if ($ref->application->accept_data_protection == 1) <strong>Yes</strong> @else <strong>No</strong> @endif<br /><br />
        Date: <strong>{!! date("d/m/y", strtotime($ref->application->created_at)) !!}</strong><br /><br />
        Digital Signature: <strong style="border-bottom: 1px solid #a1a1a1;">{!! $ref->application->signed_by !!}</strong>
    </td>
</tr>
</table>
</body>
</html>