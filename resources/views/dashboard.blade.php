@extends('partials/layout')
@section('meta_title')
    Dashboard
@endsection
@section('title')
    Account Information
@endsection
@section('content')

<div class="col-md-6 col-sm-6 col-xs-6">
    <h5>Company Logo</h5><hr />
    @if (! empty(Auth::user()->company->logo))<img src="/uploads/{!! Auth::user()->company->logo !!}" class="img-thumbnail">@endif
</div>
<div class="col-md-6 col-sm-6 col-xs-6">
    <h5>Company Profile</h5><hr />
    <table>
        <tr>
            <td>@if(! empty(Auth::user()->company->phone))<i class="fa fa-phone"></i>&nbsp;&nbsp;&nbsp;{!! Auth::user()->company->phone !!}@endif</td>
        </tr>
        <tr>
            <td>@if(! empty(Auth::user()->company->email))<i class="fa fa-envelope-o"></i>&nbsp;&nbsp;<a href="mailto:{!! Auth::user()->company->email !!}">{!! Auth::user()->company->email !!}</a>@endif</td>
        </tr>
        <tr>
            <td>@if(! empty(Auth::user()->company->website))<i class="fa fa-globe"></i>&nbsp;&nbsp;&nbsp;<a href="http://{!! Auth::user()->company->website !!}" target="_blank">{!! Auth::user()->company->website !!}</a>@endif</td>
        </tr>
    </table>
    <hr />
    <table>
        <tr>
            <td>@if(! empty(Auth::user()->company->name)) <strong>{!! Auth::user()->company->name !!}</strong> @endif</td>
        </tr>
        <tr>
            <td>@if(! empty(Auth::user()->company->address1)) {!! Auth::user()->company->address1 !!} @endif</td>
        </tr>
        <tr>
            <td>@if(! empty(Auth::user()->company->address2)){!! Auth::user()->company->address2 !!} @endif</td>
        </tr>
        <tr>
            <td>@if(! empty(Auth::user()->company->city)){!! Auth::user()->company->city !!} @endif</td>
        </tr>
        <tr>
            <td>@if(! empty(Auth::user()->company->postcode)){!! Auth::user()->company->postcode !!} @endif</td>
        </tr>
    </table>
</div>

@endsection

@section('dboard')
    <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <div class="panel panel-default">
            <div class="panel-heading">Notifications</div>
            <div class="panel-body">
                @if (count($notifications))
                    @include('notifications')
                @else
                    No new notifications
                @endif
            </div>
        </div>
    </div>
@endsection