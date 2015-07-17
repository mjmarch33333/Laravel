@extends('loggedinmaster')


@section('title')
    {{ $users[0]->name }}
@stop

@section('content')

<form method="POST" action="/admin/viewuser/{{ $users[0]->id }}">
    {!! csrf_field() !!}

</p>
    <p class="button-height inline-label">
        <label for="validation-select" class="label">Email</label>
        <input type="text" name="email" id="input-1" size="9" class="input full-width" value="{{ $users[0]->email }}">
</p>

</p>
    <p class="button-height inline-label">
        <label for="validation-select" class="label">Phone Number</label>
        <input type="text" name="phone_number" id="input-2" size="9" class="input full-width" value="{{ $users[0]->phone_number }}">
</p>

@if (\Auth::user()->admin_site_id > 0)
<p class="button-height inline-label">
    <span class="label">Administrator</span>
    <span class="button-group">
            @if ($users[0]->admin_site_id > 0)
            <label for="button-radio-1" class="button green-active">
                <input type="radio" name="admin_site_id" id="button-radio-1" value="1" checked>
                   Yes
            </label>
            <label for="button-radio-2" class="button green-active">
                <input type="radio" name="admin_site_id" id="button-radio-2" value="0">                        No
            </label>
        @else
            <label for="button-radio-1" class="button green-active">
                <input type="radio" name="admin_site_id" id="button-radio-1" value="1">
                    Yes
            </label>
            <label for="button-radio-2" class="button green-active">
                <input type="radio" name="admin_site_id" id="button-radio-2" value="0" checked>
                    No
            </label>
        @endif
    </span>
</p>

<p class="button-height inline-label">
    <span class="label">Available to Schedule</span>
    <span class="button-group">
            @if ($users[0]->schedule_site_id > 0)
            <label for="button-radio-3" class="button green-active">
                <input type="radio" name="schedule_site_id" id="button-radio-3" value="1" checked>
                   Yes
            </label>
            <label for="button-radio-4" class="button green-active">
                <input type="radio" name="schedule_site_id" id="button-radio-4" value="0">                        No
            </label>
        @else
            <label for="button-radio-3" class="button green-active">
                <input type="radio" name="schedule_site_id" id="button-radio-3" value="1">
                    Yes
            </label>
            <label for="button-radio-4" class="button green-active">
                <input type="radio" name="schedule_site_id" id="button-radio-4" value="0" checked>
                    No
            </label>
        @endif
    </span>
</p>
@endif
    <div>
        <button type="submit">Update Profile</button>
    </div>
</form>

@stop