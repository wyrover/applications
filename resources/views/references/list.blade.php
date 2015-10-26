@extends('partials/layout')
@section('meta_title')
    References
@endsection
@section('title')
    References
@endsection
@section('content')
    <div class="pull-right">
        <a href="/references/new" class="btn btn-primary">New Reference Request</a>
    </div>

 @if(count($refs))

    <table class="table table-striped">
        <thead>
            <tr>
                <th>Submitted</th>
                <th>Applicant Name</th>
                {{--<th>City</th>--}}
                <th>References</th>
                <th>Actions</th>
            </tr>
        </thead>

        <tbody>
        @foreach($refs as $ref)
            <tr>
                <td>{!! date('d/m/y', strtotime($ref->application()->first()->created_at)) !!}</td>
                <td>{!! $ref->application()->first()->first_name !!}&nbsp;{!! $ref->application()->first()->surname !!}</td>
                <td>
                    @if ($ref->completed == 'No')
                        <button class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Awaiting response from referee"><i class="fa fa-clock-o"></i></button>
                    @else
                        <a href="/applications/export/exportReferee/{!! $ref->id !!}" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Download Reference"><i class="fa fa-download"></i> Download</a>
                    @endif
                    @if ($ref->completed == 'No')
                        <button class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Awaiting response from referee"><i class="fa fa-clock-o"></i></button>
                    @else
                        <a href="/applications/export/exportReferee/{!! $ref->id !!}" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Download Reference"><i class="fa fa-download"></i> Download</a>
                    @endif
                </td>
                <td>
                    <a href="/references/{!! $ref->id !!}/delete" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove this?')"><i class="fa fa-trash"></i> Delete</a>
                </td>
            </tr>
        @endforeach
        </tbody>
    </table>

    {!! $refs->render() !!}
 @else
    <p>No records</p>
 @endif
@endsection