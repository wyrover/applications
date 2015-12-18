<input name="csrf-token" type="hidden" value="{{ csrf_token() }}">

@foreach ($notifications as $notification)
    <div class="notifications">
        @if ($notification->importance == 'High')
            <div class="notify danger">
                <button type="button" class="close del-banner-btn" data-notify-id="High" name="close" data-banner-id="{!! $notification->id !!}" data-user-id="{!! Auth::id() !!}">&times;</button>
                <strong>{!! $notification->name !!}</strong>
            </div>
        @endif
    </div>

    <div class="notifications">
        @if($notification->importance == 'Medium')
            <div class="notify warning">
                <button type="button" class="close del-banner-btn" data-notify-id="Medium" name="close" data-banner-id="{!! $notification->id !!}" data-user-id="{!! Auth::id() !!}">&times;</button>
                <strong>{!! $notification->name !!}</strong>
            </div><br />
        @endif
    </div>

    <div class="notifications">
        @if($notification->importance == 'Low')
            <div class="notify info" role="alert">
                <button type="button" class="close del-banner-btn" data-notify-id="Low" name="close" data-banner-id="{!! $notification->id !!}" data-user-id="{!! Auth::id() !!}">&times;</button>
                <strong>{!! $notification->name !!}</strong>
            </div>
        @endif
    </div>

@endforeach


