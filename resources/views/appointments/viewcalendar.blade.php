@extends('loggedinmaster')


@section('title')
    Appointments
@stop

@section('content')

</table>

	<div class="agenda with-header auto-scroll" data-agenda-options='{"auto":false,"first":3}'>

		<!-- Time markers -->
		<ul class="agenda-time">
			<li class="from-7 to-8"><span>7 AM</span></li>
			<li class="from-8 to-9"><span>8 AM</span></li>
			<li class="from-9 to-10"><span>9 AM</span></li>
			<li class="from-10 to-11"><span>10 AM</span></li>
			<li class="from-11 to-12"><span>11 AM</span></li>
			<li class="from-12 to-13 blue"><span>NOON</span></li>
			<li class="from-13 to-14"><span>1 PM</span></li>
			<li class="from-14 to-15"><span>2 PM</span></li>
			<li class="from-15 to-16"><span>3 PM</span></li>
			<li class="from-16 to-17"><span>4 PM</span></li>
			<li class="from-17 to-18"><span>5 PM</span></li>
			<li class="from-18 to-19"><span>6 PM</span></li>
			<li class="from-19 to-20"><span>7 PM</span></li>
			<li class="at-20"><span>8 PM</span></li>
		</ul>

		<!-- Columns wrapper -->
		<div class="agenda-wrapper">
			@for ($i = 0; $i < 7; $i++)
				<!-- Events list -->
				<div class="agenda-events agenda-day{{$i+1}}">
					<div class="agenda-header">
						{{date("l",strtotime(date('Y-m-d', strtotime("+$i day", strtotime($startDate)))))}} {{date('F', strtotime("+$i day", strtotime($startDate)))}} {{date('d', strtotime("+$i day", strtotime($startDate)))}}, {{date('Y', strtotime("+$i day", strtotime($startDate)))}}
					</div>
					@for ($n = 7; $n < 20; $n++)
						<a href="/appointments/create/{{date('Y-m-d', strtotime("+$i day", strtotime($startDate)))}}/{{$n}}/0">	
							<span class="agenda-event from-{{$n}} to-{{$n+1}} anthracite-gradient event-6-on-6">
								<time>{{$n}} - {{$n+1}}</time>
								Create Appt
							</span>
						</a>
					@endfor


					@foreach ($appointments as $appointment)
						@if ($appointment->appt_date == date('Y-m-d', strtotime("+$i day", strtotime($startDate))))
							@if ($appointment->intervalappt >= 0)
								@if($appointment->appt_start_minute == 0 && $appointment->appt_end_minute == 0)
									<a href="/appointments/edit/{{ $appointment->appt_id }}">
										<span class="agenda-event from-{{ $appointment->appt_start_hour}} to-{{ $appointment->appt_end_hour}} event-{{ $appointment->intervalCount}}-on-{{ $appointment->intervalappt+1}}">
											<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
											Appt: {{ $appointment->name }}
										</span>
									</a>
								@elseif($appointment->appt_start_minute == 0)
									<a href="/appointments/edit/{{ $appointment->appt_id }}">
										<span class="agenda-event from-{{ $appointment->appt_start_hour}} to-{{ $appointment->appt_end_hour}}-{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}} event-{{ $appointment->intervalCount}}-on-{{ $appointment->intervalappt+1}}">
											<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
											Appt: {{ $appointment->name }}
										</span>		
									</a>
								@elseif($appointment->appt_end_minute == 0)
									<a href="/appointments/edit/{{ $appointment->appt_id }}">
									 	<span class="agenda-event from-{{ $appointment->appt_start_hour}}-{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT)}} to-{{ $appointment->appt_end_hour}} event-{{ $appointment->intervalCount}}-on-{{ $appointment->intervalappt+1}}">
											<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
											Appt: {{ $appointment->name }}
										</span>	
									</a>	
								@else
									<a href="/appointments/edit/{{ $appointment->appt_id }}">
										<span class="agenda-event from-{{ $appointment->appt_start_hour}}-{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT)}} to-{{ $appointment->appt_end_hour}}-{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}} event-{{ $appointment->intervalCount}}-on-{{ $appointment->intervalappt+1}}">
											<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
											Appt: {{ $appointment->name }}
										</span>									
									</a>	
								@endif
							@else
    							@if($appointment->appt_start_minute == 0 && $appointment->appt_end_minute == 0)
									<a href="/appointments/edit/{{ $appointment->appt_id }}" class="agenda-event from-{{ $appointment->appt_start_hour}} to-{{ $appointment->appt_end_hour}}">
										<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
										Appt: {{ $appointment->name }}
									</a>
								@elseif($appointment->appt_start_minute == 0)
									<a href="/appointments/edit/{{ $appointment->appt_id }}" class="agenda-event from-{{ $appointment->appt_start_hour}} to-{{ $appointment->appt_end_hour}}-{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT) }}">
										<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
										Appt: {{ $appointment->name }}
									</a>
								@elseif($appointment->appt_end_minute == 0)
									<a href="/appointments/edit/{{ $appointment->appt_id }}" class="agenda-event from-{{ $appointment->appt_start_hour}}-{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} to-{{ $appointment->appt_end_hour}}">
										<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
										Appt: {{ $appointment->name }}
									</a>
								@else
									<a href="/appointments/edit/{{ $appointment->appt_id }}" class="agenda-event from-{{ $appointment->appt_start_hour}}-{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} to-{{ $appointment->appt_end_hour}}-{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT) }}">
										<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
										Appt: {{ $appointment->name }}
									</a>
								@endif
							@endif
						@endif
					@endforeach
				</div>
			@endfor				
		</div>
</div>

			<h3 class="thin">Weekly agenda</h3>

			<div class="agenda with-header auto-scroll">

				<!-- Time markers -->
				<ul class="agenda-time">
					<li class="from-7 to-8"><span>7 AM</span></li>
					<li class="from-8 to-9"><span>8 AM</span></li>
					<li class="from-9 to-10"><span>9 AM</span></li>
					<li class="from-10 to-11"><span>10 AM</span></li>
					<li class="from-11 to-12"><span>11 AM</span></li>
					<li class="from-12 to-13 blue"><span>NOON</span></li>
					<li class="from-13 to-14"><span>1 PM</span></li>
					<li class="from-14 to-15"><span>2 PM</span></li>
					<li class="from-15 to-16"><span>3 PM</span></li>
					<li class="from-16 to-17"><span>4 PM</span></li>
					<li class="from-17 to-18"><span>5 PM</span></li>
					<li class="from-18 to-19"><span>6 PM</span></li>
					<li class="from-19 to-20"><span>7 PM</span></li>
					<li class="at-20"><span>8 PM</span></li>
				</ul>

				<!-- Columns wrapper -->
				<div class="agenda-wrapper">
			@for ($i = 0; $i < 7; $i++)
				<!-- Events list -->
				<div class="agenda-events agenda-day{{$i+1}}">
					<div class="agenda-header">
						{{date('Y-m-d', strtotime("+$i day", strtotime($startDate)))}} {{date("l",strtotime(date('Y-m-d', strtotime("+$i day", strtotime($startDate)))))}}
					</div>
					@foreach ($appointments as $appointment)
						@if ($appointment->appt_date == date('Y-m-d', strtotime("+$i day", strtotime($startDate))))
							@if ($appointment->intervalappt > 1)
								@if($appointment->appt_start_minute == 0 && $appointment->appt_end_minute == 0)
									<a href="/appointments/edit/{{ $appointment->appt_id }}">
										<span class="agenda-event from-{{ $appointment->appt_start_hour}} to-{{ $appointment->appt_end_hour}} event-{{ $appointment->intervalCount}}-on-{{ $appointment->intervalappt}}">
											<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
											Appt: {{ $appointment->name }}
										</span>
									</a>
								@elseif($appointment->appt_start_minute == 0)
									<a href="/appointments/edit/{{ $appointment->appt_id }}">
										<span class="agenda-event from-{{ $appointment->appt_start_hour}} to-{{ $appointment->appt_end_hour}}-{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}} event-{{ $appointment->intervalCount}}-on-{{ $appointment->intervalappt}}">
											<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
											Appt: {{ $appointment->name }}
										</span>		
									</a>
								@elseif($appointment->appt_end_minute == 0)
									<a href="/appointments/edit/{{ $appointment->appt_id }}">
									 	<span class="agenda-event from-{{ $appointment->appt_start_hour}}-{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT)}} to-{{ $appointment->appt_end_hour}} event-{{ $appointment->intervalCount}}-on-{{ $appointment->intervalappt}}">
											<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
											Appt: {{ $appointment->name }}
										</span>	
									</a>	
								@else
									<a href="/appointments/edit/{{ $appointment->appt_id }}">
										<span class="agenda-event from-{{ $appointment->appt_start_hour}}-{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT)}} to-{{ $appointment->appt_end_hour}}-{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}} event-{{ $appointment->intervalCount}}-on-{{ $appointment->intervalappt}}">
											<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
											Appt: {{ $appointment->name }}
										</span>									
									</a>	
								@endif
							@else
    							@if($appointment->appt_start_minute == 0 && $appointment->appt_end_minute == 0)
									<a href="/appointments/edit/{{ $appointment->appt_id }}" class="agenda-event from-{{ $appointment->appt_start_hour}} to-{{ $appointment->appt_end_hour}}">
										<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
										Appt: {{ $appointment->name }}
									</a>
								@elseif($appointment->appt_start_minute == 0)
									<a href="/appointments/edit/{{ $appointment->appt_id }}" class="agenda-event from-{{ $appointment->appt_start_hour}} to-{{ $appointment->appt_end_hour}}-{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT) }}">
										<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
										Appt: {{ $appointment->name }}
									</a>
								@elseif($appointment->appt_end_minute == 0)
									<a href="/appointments/edit/{{ $appointment->appt_id }}" class="agenda-event from-{{ $appointment->appt_start_hour}}-{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} to-{{ $appointment->appt_end_hour}}">
										<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
										Appt: {{ $appointment->name }}
									</a>
								@else
									<a href="/appointments/edit/{{ $appointment->appt_id }}" class="agenda-event from-{{ $appointment->appt_start_hour}}-{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} to-{{ $appointment->appt_end_hour}}-{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT) }}">
										<time>{{ $appointment->appt_start_hour}}:{{ str_pad($appointment->appt_start_minute, 2, '0', STR_PAD_LEFT) }} - {{ $appointment->appt_end_hour}}:{{ str_pad($appointment->appt_end_minute, 2, '0', STR_PAD_LEFT)}}</time>
										Appt: {{ $appointment->name }}
									</a>
								@endif
							@endif
						@endif
					@endforeach
				</div>
			@endfor		

				</div>

			</div>
@stop