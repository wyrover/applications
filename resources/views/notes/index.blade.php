@extends('partials/layout')
@section('meta_title')
    Notes
@endsection
@section('title')
    Notes
@endsection
@section('content')
    <div class="pull-right">
        <!-- Button trigger modal -->
        <button type="button" class="btn btn-success btn-lg" data-toggle="modal" data-target="#createNote">
            Create Note
        </button>
    </div>
    @if (count($notes))
        <a href="{!! goBack() !!}" class="btn btn-primary">Go back</a><br /><br />
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>Content</th>
                    <th>Created At</th>
                    <th></th>
                </tr>
            </thead>

            <tbody>
            @foreach($notes as $note)
                <tr>
                    <td>{!! $note->content !!}</td>
                    <td>{!! date('d/m/y', strtotime($note->created_at)) !!}&nbsp;&nbsp;by&nbsp;&nbsp;{!! Auth::user()->company->name !!}</td>
                    <td></td>
                    <td><a href="/applications/notes/{!! $note->id !!}/delete" onclick="return confirm('Are you sure you want to remove this?')"><i class="fa fa-times"></i></a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
        {!! $notes->render() !!}
    @else
        <p>No records to display</p>
    @endif

            <!-- Modal -->
        <div class="modal fade" id="createNote" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title" id="myModalLabel">Create New Note</h4>
                    </div>
                    <div class="modal-body">
                        {!! Form::open(['url' => 'applications/notes/create', 'class' => 'form-horizontal']) !!}
                        <input type="hidden" name="user_id" value="{!! Request::segment(2) !!}">
                        <input type="hidden" name="created_by" value="{!! auth()->user()->name !!}">
                        <div class="form-group">
                            <div class="col-sm-3">Note</div>
                            <div class="col-lg-9">
                                <textarea name="content" class="form-control" rows="10"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Create</button>
                    </div>
                    {!! Form::close() !!}
                </div>
            </div>
        </div>
@endsection