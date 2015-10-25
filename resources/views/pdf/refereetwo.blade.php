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
            @if(! empty($profile->company()->first()->logo))
                <img src="uploads/{!! $profile->company()->first()->logo !!}" width="190">
            @endif
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
        <td align="left">
            <h3>Reference Details</h3>
            Name: @if(! empty($ref->referee_name2)) <strong>{!! $ref->referee_name2 !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Company Name: @if(! empty($ref->referee_company2)) <strong>{!! $ref->referee_company2 !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Email Address: @if(! empty($ref->referee_email2 )) <strong>{!! $ref->referee_email2 !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />

        </td>
        <td>
            <h4>First Referee</h4>
            Relationship: @if(! empty( $ref->referee_relationship2)) <strong>{!! $ref->referee_relationship2 !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Is this your previous /current employer?: @if(! empty($ref->referee_current_employer2)) <strong>{!! $ref->referee_current_employer2 !!}</strong> @else <span class="no-answer">No answer given</span> @endif<br />
            Can we contact this reference?: @if(! empty($ref->referee_contact2)) <strong>{!! $ref->referee_contact2!!}</strong> @else <span class="no-answer">No answer given</span> @endif
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
                @if (! empty($settings->label) && $c->answer) {!! $settings->label !!}: <strong>{!! $c->answer !!}</strong><br />@endif
                @if (! empty($settings->label2) && $c->answer2) {!! $settings->label2 !!}: <strong>{!! $c->answer2 !!}</strong><br />@endif
                @if (! empty($settings->label3) && $c->answer3) {!! $settings->label3 !!}: <strong>{!! $c->answer3 !!}</strong><br />@endif
                @if (! empty($settings->label4) && $c->answer4) {!! $settings->label4 !!}: <strong>{!! $c->answer4 !!}</strong><br />@endif
                @if (! empty($settings->label5) && $c->answer5) {!! $settings->label5 !!}: <strong>{!! $c->answer5 !!}</strong><br />@endif
                @if (! empty($settings->label6) && $c->answer6) {!! $settings->label6 !!}: <strong>{!! $c->answer6 !!}</strong><br />@endif
                @if (! empty($settings->label7) && $c->answer7) {!! $settings->label7 !!}: <strong>{!! $c->answer7 !!}</strong><br />@endif
                @if (! empty($settings->label8) && $c->answer8) {!! $settings->label8 !!}: <strong>{!! $c->answer8 !!}</strong><br />@endif
                @if (! empty($settings->label9) && $c->answer9) {!! $settings->label9 !!}: <strong>{!! $c->answer9 !!}</strong><br />@endif
                @if (! empty($settings->label10) && $c->answer10) {!! $settings->label10 !!}: <strong>{!! $c->answer10 !!}</strong><br />@endif
            </td>
        </tr>
    @endforeach
</table>

</body>
</html>