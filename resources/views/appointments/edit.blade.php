<!-- resources/views/appointments/create.blade.php -->

@extends('loggedinmaster')


@section('title')
    Appointments
@stop

@section('content')

@foreach ($appointments as $appointment)

<h1>Appointment for: {{ $appointment->name }}</h1>

<form method="POST" action="/appointments/edit/{{ $appointment->appt_id  }}">
    {!! csrf_field() !!}


    <p class="button-height inline-label">
        <label for="validation-select" class="label">Select</label>
        <select name="appt_with_id" class="select validate[required]">
            @foreach ($apptpeople as $apptperson)
                @if ($apptperson->id == $appointment->appt_with_id)
                    <option value="{{ $apptperson->id }}" selected> {{ $apptperson->name }}</option>
                @else
                    <option value="{{ $apptperson->id }}"> {{ $apptperson->name }}</option>
                @endif
            @endforeach
        </select>
    </p>
        <p class="button-height inline-label">
        <label for="validation-select" class="label">Comments</label>
        <input type="text" name="comments" id="input-3" size="9" class="input full-width" value="{{ $appointment->comments }}">
    </p>
                        

    </p>
        <p class="button-height inline-label">
        <label for="validation-select" class="label">Date</label>
        <input type="date" name="appt_date" value="{{ $appointment->appt_date }}">
    </p>

    <p class="button-height inline-label">
        <label for="validation-select" class="label">Start Time</label>
        <select name="appt_start_hour" class="select validate[required]">
            @for ($i = 0; $i < 24; $i++) 
                <option value="{{ $i }}"
                @if ($appointment->appt_start_hour == $i)
                    selected
                @endif
                >{{ $i }}</option>
            @endfor
        </select> :
        <select name="appt_start_minute" class="select validate[required]">
            @for ($i = 0; $i < 2; $i++) 
                <option value="{{ $i*30 }}"
                @if ($appointment->appt_start_minute == $i*30)
                    selected
                @endif
                >{{ $i*30 }}</option>
            @endfor
        </select>
    </p>

    <p class="button-height inline-label">
        <label for="validation-select" class="label">End Time</label>
        <select name="appt_end_hour" class="select validate[required]">
            @for ($i = 0; $i < 24; $i++) 
                <option value="{{ $i }}"
                @if ($appointment->appt_end_hour == $i)
                    selected
                @endif
                >{{ $i }}</option>
            @endfor
        </select> :
        <select name="appt_end_minute" class="select validate[required]">
            @for ($i = 0; $i < 2; $i++) 
                <option value="{{ $i*30 }}"
                @if ($appointment->appt_end_minute == $i*30)
                    selected
                @endif
                >{{ $i*30 }}</option>
            @endfor
        </select>
    </p>

    <p class="button-height inline-label">
        <span class="label">1 Day SMS/Text Reminder</span>
        <span class="button-group">
            @if ($appointment->sms_1day == 1)
                <label for="button-radio-1" class="button green-active">
                    <input type="radio" name="sms_1day" id="button-radio-1" value="1" checked>
                       Yes
                </label>
                <label for="button-radio-2" class="button green-active">
                    <input type="radio" name="sms_1day" id="button-radio-2" value="0">
                        No
                </label>
            @else
                <label for="button-radio-1" class="button green-active">
                    <input type="radio" name="sms_1day" id="button-radio-1" value="1">
                       Yes
                </label>
                <label for="button-radio-2" class="button green-active">
                    <input type="radio" name="sms_1day" id="button-radio-2" value="0" checked>
                        No
                </label>
            @endif
        </span>
    </p>

    <p class="button-height inline-label">
        <span class="label">1 Hour SMS/Text Reminder</span>
        <span class="button-group">
            @if ($appointment->sms_1hour == 1)
                <label for="button-radio-3" class="button green-active">
                    <input type="radio" name="sms_1hour" id="button-radio-3" value="1" checked>
                       Yes
                </label>
                <label for="button-radio-4" class="button green-active">
                    <input type="radio" name="sms_1hour" id="button-radio-4" value="0">
                        No
                </label>
            @else
                <label for="button-radio-3" class="button green-active">
                    <input type="radio" name="sms_1hour" id="button-radio-3" value="1">
                       Yes
                </label>
                <label for="button-radio-4" class="button green-active">
                    <input type="radio" name="sms_1hour" id="button-radio-4" value="0" checked>
                        No
                </label>
            @endif
        </span>
    </p>

    <div>
        <button type="submit">Update Appointment</button>
    </div>
</form>
@endforeach

@stop