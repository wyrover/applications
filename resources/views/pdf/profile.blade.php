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
            <img src="uploads/{!! $profile->company()->first()->logo !!}" width="190">
        </td>
        <td align="left" class="address">
            {!! $profile->company()->first()->address1 !!}<br />
            {!! $profile->company()->first()->address2 !!}<br />
            {!! $profile->company()->first()->city !!}<br />
            {!! $profile->company()->first()->postcode !!}<br />

        </td>
        <td align="left" class="contact">
            {!! $profile->company()->first()->phone !!}<br />
            {!! $profile->company()->first()->email !!}<br />
            {!! $profile->company()->first()->website !!}<br />
        </td>
    </tr>
</table>

<br />

<table width="100%" border="0" cellspacing="0" cellpadding="0">
    <tr>
        <td align="left">
            <h3>Personal Details</h3>
            First Name: <strong>{!! $profile->first_name !!}</strong><br />
            @if (! empty($profile->middle_name)) Middle Names: <strong>{!! $profile->middle_name !!}</strong> <br />@endif
            Surname: <strong>{!! $profile->surname !!}</strong><br />
            Address Line 1: <strong>{!! $profile->address_line1 !!}</strong><br />
            Address Line 2: <strong>{!! $profile->address_line2 !!}</strong><br />
            City: <strong>{!! $profile->city !!}</strong><br />
            Postcode: <strong>{!! $profile->postcode !!}</strong><br />
        </td>
        <td>
            Telephone: <strong>{!! $profile->telephone !!}</strong><br />
            Mobile: <strong>{!! $profile->mobile !!}</strong><br />
            Email: <strong>{!! $profile->email !!}</strong><br />
            National Insurance Number: <strong>{!! $profile->ni_number !!}</strong><br />
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
            {!! nl2br($profile->education) !!}
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
            Job Title: <strong>{!! $profile->job_title !!}</strong><br />
            Start Date: @if (! empty($profile->employer_start_date)) <strong>{!! $profile->employer_start_date !!}</strong> @else <span class="no-answer">No answer given</span> @endif
        </td>
        <td>
            <h4>Work Experience 1</h4>
            {!! nl2br($profile->employer_responsibilities) !!}
        </td>

    </tr>
    <tr>
        <td>
            Job Title: <strong>{!! $profile->job_title2 !!}</strong><br />
            Start Date: @if (! empty($profile->employer_start_date2)) <strong>{!! $profile->employer_start_date2 !!}</strong> @else <span class="no-answer">No answer given</span> @endif

        </td>
        <td>
            <h4>Work Experience 2</h4>
            {!! nl2br($profile->employer_responsibilities2) !!}
        </td>
    </tr>
    <tr>
        <td>
            Job Title: <strong>{!! $profile->job_title3 !!}</strong><br />
            Start Date: @if (! empty($profile->employer_start_date3)) <strong>{!! $profile->employer_start_date3 !!}</strong> @else <span class="no-answer">No answer given</span> @endif

        </td>
        <td>
            <h4>Work Experience 3</h4>
            {!! nl2br($profile->employer_responsibilities3) !!}
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
            essential for the role you seek?: <strong>{!! nl2br($profile->health_info) !!}</strong>
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
            <h3>Criminal Convictions</h3>
            Do you have any unspent* criminal convictions?:  <strong>{!! nl2br($profile->criminal_convictions) !!}</strong><br />
            Comment Box: @if(! empty($profile->convictions_comments)) {!! nl2br($profile->convictions_comments) !!} @else <span class="no-answer">No answer given</span> @endif
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
            Relationship to you: @if(! empty($profile->next_of_kin_relationship)) <strong>{!! $profile->next_of_kin_relationship !!}</strong>  @else <span class="no-answer">No answer given</span> @endif<br />
            Name: @if(! empty($profile->next_of_kin_name)) <strong>{!! $profile->next_of_kin_name !!}</strong>  @else <span class="no-answer">No answer given</span> @endif<br />
            Address: @if(! empty($profile->next_of_kin_address)) <strong>{!! $profile->next_of_kin_address !!}</strong>  @else <span class="no-answer">No answer given</span> @endif
        </td>
        <td>
            Telephone: @if(! empty($profile->next_of_kin_telephone)) <strong>{!! $profile->next_of_kin_telephone !!}</strong>  @else <span class="no-answer">No answer given</span> @endif<br />
            Mobile: @if(! empty($profile->next_of_kin_mobile)) <strong>{!! $profile->next_of_kin_mobile !!}</strong>  @else <span class="no-answer">No answer given</span> @endif
        </td>
    </tr>
</table>



</body>
</html>