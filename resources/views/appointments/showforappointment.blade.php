
@extends('loggedinmaster')


@section('title')
    Appointments
@stop

@section('content')
	<table border="1" style="width:100%">
	<tr>	
    	<td>Date</td>
    	<td>Time</td>
    	<td>Name</td>	
    	<td>Appointment With</td>
    	<td>Comments</td>
    	<td>1 Day Reminder</td>
    	<td>1 Hour Reminder</td>
    </tr>
    @for ($i = 0; $i < 24; $i++)
        @for ($j = 0; $j < 4; $j++)     


            <tr>
                <td><a href="">todaydate</a>
                </td>
                @if ($i<10 && $j==0)
                    <td>
                        0{{$i}}:00
                    </td>
                @elseif ($i<10)
                    <td>
                        0{{$i}}:{{ $j*15 }}
                    </td>
                @elseif ($j==0)
                    <td>
                        {{$i}}:00
                    </td>
                @else
                    <td>
                        {{$i}}:{{ $j*15 }}
                    </td>
                @endif

                <td></td>        
                <td></td>
                <td></td>
                <td></td>
                <td></td>
            </tr>
            @foreach ($appointments as $appointment)
                @if ($appointment->appt_hour == $i)
                    @if ($appointment->appt_minute == $j)
                        <tr>
                            @if (\Auth::user()->admin_site_id > 0 || \Auth::user()->id === $appointment->user_id)
			                     <td><a href="edit/{{ $appointment->appt_id }}">{{ $appointment->appt_date }} </a>
			                     </td>
    	                    @else
    		                      <td>{{ $appointment->appt_date  }}</td>
		                    @endif
                            @if ($appointment->appt_hour<10 && $appointment->appt_minute==0)
                                <td>
                                    0{{ $appointment->appt_hour }}:00
                                </td>
                            @elseif ($appointment->appt_hour<10)
                                <td>
                                    0{{ $appointment->appt_hour }}:{{ $appointment->appt_minute }}
                                </td>
                            @elseif ($appointment->appt_minute==0)
                                <td>
                                    {{ $appointment->appt_hour }}:00
                                </td>
                            @else
                                <td>
                                    {{ $appointment->appt_hour }}:{{ $appointment->appt_minute }}
                                </td>
                            @endif
    	                    <td>{{ $appointment->name }}</td>		
    	                    <td>{{ $appointment->appt_with }}</td>
    	                    <td>{{ $appointment->comments }}</td>
    	                    <td>{{ $appointment->sms_1day }}</td>
    	                    <td>{{ $appointment->sms_1hour }}</td>
    	                </tr>
                    @endif
                @endif
            @endforeach
        @endfor
    @endfor
</table>
@stop