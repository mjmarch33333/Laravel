@extends('loggedinmaster')

@section('content')

@foreach ($appointments as $appointment)

<h1>Delete appointment for: {{ $appointment->name }}</h1>

<form method="POST" action="/appointments/delete/{{ $appointment->appt_id  }}">
    {!! csrf_field() !!}


    <p class="button-height inline-label">
        <label for="validation-select" class="label">Appointment with: </label>
        {{$appointment->appt_with}}
    </p>
    <p class="button-height inline-label">
        <label for="validation-select" class="label"> Comments: </label>
        {{ $appointment->comments }}
    </p>
        <p class="button-height inline-label">
        <label for="validation-select" class="label">Date</label>
        {{ $appointment->appt_date }}
    </p>

    <p class="button-height inline-label">
        <label for="validation-select" class="label">Start Time</label>
            {{$appointment->appt_start_hour}}:{{$appointment->appt_start_minute}}
    </p>

    <p class="button-height inline-label">
        <label for="validation-select" class="label">End Time</label>
            {{$appointment->appt_end_hour}}:{{$appointment->appt_end_minute}}
    </p>
    

    <div>
        <button type="submit">Confirm Delete</button>
    </div>
</form>
@endforeach

@if ($errors->any())
    <ul>
        @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif

@stop