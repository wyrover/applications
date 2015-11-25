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
            <th>References</th>
            <th>Action</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
    @foreach($applications as $item)

        <tr>
            <td>{!! $item->created_at->toFormattedDateString() !!}</td>
            <td>{!! $item->first_name !!}&nbsp;{!! $item->surname !!}</td>
            <td>{!! $item->city !!}</td>
            <td>
                {!! Form::open(['url' => '/applications/export/application/' . $item->id, 'class' => 'form-horizontal']) !!}
                    <input type="hidden" name="ref_one" value="{!! $item->reference_id !!}">
                    <input type="hidden" name="ref_two" value="{!! $item->reference_two_id !!}">
                    <button type="submit" class="btn btn-sm btn-default"  data-toggle="tooltip" data-placement="top" title="Download Application"><i class="fa fa-download"></i> Download</button>
                {!! Form::close() !!}
            </td>
            <td>
                {{--// item->id is applications_id--}}
                {{--// $item->reference()->first()->id is row id --}}


                @foreach($item->reference as $referee)
                    @if ($referee->completed == 'Yes')
                        <a href="/applications/export/exportReferee/{!! $referee->id !!}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Download Reference"><i class="fa fa-download"></i> Download</a>
                    @elseif ($referee->completedtwo == 'Yes')
                        <a href="/applications/export/exportRefereeTwo/{!! $referee->id !!}" class="btn btn-sm btn-success" data-toggle="tooltip" data-placement="top" title="Download Reference"><i class="fa fa-download"></i> Download</a>
                    @else
                        <button class="btn btn-sm btn-warning" data-toggle="tooltip" data-placement="top" title="Awaiting response from referee"><i class="fa fa-clock-o"></i></button>
                    @endif
                @endforeach
            </td>
            <td>
                <a href="/applications/{!! $item->id !!}/notes" class="btn btn-sm btn-default" data-toggle="tooltip" data-placement="top" title="Notes"><i class="fa fa-edit"></i> Notes</a>
            </td>
            <td>
                {!! Form::open(['url' => '/applications/delete']) !!}
                     <input type="hidden" name="_method" value="DELETE">
                          <input type="hidden" name="id" value="{!! $item->id !!}">
                          <button type="submit" class="btn btn-sm btn-danger" onclick="return confirm('Are you sure you want to remove this?')"><i class="fa fa-trash-o"></i> Delete</button>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>

</table>
    {!! $applications->render() !!}
@else
    <p>No records</p>
@endif
@endsection
