@extends('loggedinmaster')


@section('title')
    Send SMS
@stop

@section('content')

<form method="POST" action="/admin/sendsimplesms">
    {!! csrf_field() !!}

    <p class="button-height inline-label">
        <label for="validation-select" class="label">Phone Number</label>
        <input type="text" name="phone_number" id="input-1" size="9" class="input full-width">
    </p>
    <p class="button-height inline-label">
        <label for="validation-select" class="label">Message</label>
        <input type="text" name="message" id="input-2" size="50" class="input full-width">
    </p>

    <div>
        <button type="submit">Send Message</button>
    </div>
</form>

@stop