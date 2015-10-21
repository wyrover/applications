@extends('partials/layout')
@section('meta_title')
    All Applications
@endsection
@section('title')
    Applications
@endsection
@section('content')
@if(count($applications))
<table class="table table-striped table-bordered">
    <thead>
        <tr>
            <th>Date Submitted</th>
            <th>Applicant Name</th>
            <th>City</th>
            <th>Application</th>
            <th>Profile</th>
            <th>References</th>
            <th>Action</th>
        </tr>
    </thead>

    <tbody>
    @foreach($applications as $item)

        <tr>
            <td>{!! $item->created_at->toFormattedDateString() !!}</td>
            <td>{!! $item->first_name !!}&nbsp;{!! $item->surname !!}</td>
            <td>{!! $item->city !!}</td>
            <td><a href="/applications/export/application/{!! $item->id !!}" class="btn btn-sm btn-default"  data-toggle="tooltip" data-placement="top" title="Download Application"><i class="fa fa-download"></i> Download</a></td>
            <td><a href="/applications/export/{!! $item->id !!}/profile" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Download Profile"><i class="fa fa-download"></i> Download</a></td>
            <td>
                @if ($item->reference()->first()->referee_contact == 'No')
                    <button class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Awaiting response from referee"><i class="fa fa-clock-o"></i></button>
                @else
                    <a href="/applications/export/exportReferee/{!! $item->id !!}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Download Reference"><i class="fa fa-download"></i> Download</a>
                @endif
                @if ($item->reference()->first()->referee_contact2 == 'No')
                    <button class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Awaiting response from referee"><i class="fa fa-clock-o"></i></button>
                @else
                    <a href="/applications/export/exportReferee/{!! $item->id !!}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Download Reference"><i class="fa fa-download"></i> Download</a>
                @endif
            </td>
            <td>
                <a href="/applications/{!! $item->id !!}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove this?')"><i class="fa fa-trash-o"></i> Delete</a>
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
@else
    <p>No records</p>
@endif
@endsection
