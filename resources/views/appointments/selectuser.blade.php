@extends('loggedinmaster')


@section('title')
    Select For Appointment 
@stop

@section('content')

date {{$date}}
hour {{$hour}}
minute {{$minute}}

<form method="POST" action="{{Request::url()}}">
    {!! csrf_field() !!}

    <div>
        Appointment for
        <select name="appt_for_id">
            @foreach ($apptpeople as $apptperson)
                <option value="{{ $apptperson->id  }}"> {{ $apptperson->name  }}</option>

            @endforeach

        </select>
    </div>

    <div>
        <button type="submit">Select User</button>
    </div>
</form>
@stop