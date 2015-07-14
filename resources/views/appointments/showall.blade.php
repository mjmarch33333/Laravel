@extends('loggedinmaster')


@section('title')
    Appointments
@stop

@section('content')

	<table border="1" style="width:100%">
	<tr>	
    	<td>Date</td>
    	<td>Start Time</td>
        <td>End Time</td>
    	<td>Name</td>	
    	<td>Appointment With</td>
    	<td>Comments</td>
    	<td>1 Day Reminder</td>
    	<td>1 Hour Reminder</td>
  </tr>
@foreach ($appointments as $appointment)

	<tr>
		@if (\Auth::user()->admin_site_id > 0 || \Auth::user()->id === $appointment->user_id)
			<td><a href="edit/{{ $appointment->appt_id }}">{{ $appointment->appt_date  }}</a>
			</td>
    	@else
    		<td>{{ $appointment->appt_date  }}</td>
		@endif
    	<td>{{ $appointment->appt_start_hour }}:{{ $appointment->appt_start_minute }}</td>
        <td>{{ $appointment->appt_end_hour }}:{{ $appointment->appt_end_minute }}</td>
    	<td>{{ $appointment->name }}</td>		
    	<td>{{ $appointment->appt_with }}</td>
    	<td>{{ $appointment->comments }}</td>
    	<td>{{ $appointment->sms_1day }}</td>
    	<td>{{ $appointment->sms_1hour }}</td>
  	</tr>

@endforeach
</table>

@stop