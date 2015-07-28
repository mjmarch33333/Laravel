@extends('loggedinmaster')


@section('title')
    Appointments
@stop

@section('content')

<table class="table responsive-table" id="sorting-advanced">
    <thead>
        <tr>
            <th scope="col"width="15%" class="align-center">Date</th>
            <th scope="col" width="15%" class="align-center">Start Time</th>
            <th scope="col" width="15%" class="align-center">End Time</th>
            <th scope="col" width="15%" class="align-center">Name</th>
            <th scope="col" width="20" class="align-center">Appointment With</th>
            <th scope="col" width="20" class="align-center">Comments</th>
            <th scope="col" width="20" class="align-center">1 Day Reminder</th>
            <th scope="col" width="20" class="align-center">1 Hour Reminder</th>
            <th scope="col" width="45" class="align-center">Action</th>
        </tr>
    </thead>
<tbody>
@foreach ($appointments as $appointment)
    <tr>
        @if (\Auth::user()->admin_site_id > 0 || \Auth::user()->id === $appointment->user_id)
            <td><a href="/appointments/edit/{{ $appointment->appt_id }}">{{ $appointment->appt_date  }}</a>
            </td>
        @else
            <td>{{ $appointment->appt_date  }}</td>
        @endif
        <td>{{str_pad($appointment->appt_start_hour, 2, '0', STR_PAD_LEFT)}}:{{str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT)}}</td>
        <td>{{str_pad($appointment->appt_end_hour, 2, '0', STR_PAD_LEFT)}}:{{str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</td>
        <td>{{ $appointment->name }}</td>       
        <td>{{ $appointment->appt_with }}</td>
        <td>{{ $appointment->comments }}</td>
        <td>{{ $appointment->sms_1day }}</td>
        <td>{{ $appointment->sms_1hour }}</td>
        <td class="low-padding align-center">
            <a href="/appointments/edit/{{ $appointment->appt_id }}" title = "Edit" class="button compact icon-gear"></a>
            <a href="/appointments/delete/{{ $appointment->appt_id }}" title = "Delete" class="button compact icon-cross"></a>
        </td>
    </tr>

@endforeach
    </tbody>

</table>

@stop