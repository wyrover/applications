@extends('admin.layout')
@section('content')

    <div class="panel panel-default">
        <div class="panel-heading">Global Notifications</div>
        <div class="panel-body">
            <p>
                Use this section to send on screen notifications to all users.<br />
                Ideal for notifying on server issues etc.
            </p>

            {!! Form::open(['url' => '/admin/notifications', 'class' => 'form-horizontal']) !!}

            <div class="form-group">
                <div class="col-sm-2">Content</div>
                <div class="col-lg-9">
                    <textarea name="name" class="form-control" rows="12"></textarea>
                </div>
            </div>

            <div class="form-group">
                <div class="col-sm-2">Importance</div>
                <div class="col-lg-5">
                    <select name="importance" class="form-control">
                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <div class="col-lg-3 col-lg-offset-2">
                    <button class="btn btn-success">Save</button>
                </div>
            </div>

            {!! Form::close() !!}

        </div>
    </div>

@endsection