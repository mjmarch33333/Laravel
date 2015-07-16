<!-- resources/views/appointments/create.blade.php -->

@extends('loggedinmaster')


@section('title')
    Create Appointment for {{$name}}
@stop

@section('content')

<form method="POST" action="/appointments/store/{{$userid}}">
    {!! csrf_field() !!}

    <p class="button-height inline-label">
        <label for="validation-select" class="label">Select</label>
        <select name="appt_with_id" class="select validate[required]">
            @foreach ($apptpeople as $apptperson)
                <option value="{{ $apptperson->id }}"> {{ $apptperson->name }}</option>
            @endforeach
        </select>
    </p>
        <p class="button-height inline-label">
        <label for="validation-select" class="label">Comments</label>
        <input type="text" name="comments" id="input-3" size="9" class="input full-width" >
    </p>
                        

    </p>
        <p class="button-height inline-label">
        <label for="validation-select" class="label">Date</label>
        <input type="date" value ="{{$date}}" name="appt_date">
    </p>

    <p class="button-height inline-label">
        <label for="validation-select" class="label">Start Time</label>
        <select name="appt_start_hour" class="select validate[required]">
            @for ($i = 0; $i < 24; $i++) 
                <option value="{{ $i }}"
                @if ($hour == $i)
                    selected
                @endif
                >{{ $i }}</option>
            @endfor
        </select> :
        <select name="appt_start_minute" class="select validate[required]">
            @for ($i = 0; $i < 2; $i++) 
                <option value="{{ $i*30 }}"
                @if ($minute == $i*30)
                    selected
                @endif
                >{{ $i*30 }}</option>
            @endfor
        </select>
    </p>

    <p class="button-height inline-label">
        <label for="validation-select" class="label">Duration</label>

        <select name="duration">
            <option value="30">.5 Hour</option>
            <option value="60">1 Hour</option>
            <option value="90">1.5 Hours</option>
            <option value="120">2 Hours</option>
            <option value="150">2.5 Hours</option>
            <option value="180">3 Hours</option>
            <option value="210">3.5 Hours</option>
            <option value="240">4 Hours</option>
            <option value="270">4.5 Hours</option>
            <option value="300">5 Hours</option>
        </select>
    </p>

    <p class="button-height inline-label">
        <span class="label">1 Day SMS/Text Reminder</span>
        <span class="button-group">
                <label for="button-radio-1" class="button green-active">
                    <input type="radio" name="sms_1day" id="button-radio-1" value="1">
                       Yes
                </label>
                <label for="button-radio-2" class="button green-active">
                    <input type="radio" name="sms_1day" id="button-radio-2" value="0" checked>
                        No
                </label>
        </span>
    </p>

    <p class="button-height inline-label">
        <span class="label">1 Hour SMS/Text Reminder</span>
        <span class="button-group">
                <label for="button-radio-3" class="button green-active">
                    <input type="radio" name="sms_1hour" id="button-radio-3" value="1">
                       Yes
                </label>
                <label for="button-radio-4" class="button green-active">
                    <input type="radio" name="sms_1hour" id="button-radio-4" value="0" checked>
                        No
                </label>
        </span>
    </p>

    <div>
        <button type="submit">Update Appointment</button>
    </div>
</form>

@stop