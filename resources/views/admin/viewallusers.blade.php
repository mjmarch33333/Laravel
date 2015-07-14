@extends('loggedinmaster')

@section('title')
    Users
@stop

@section('content')

<table border="1" style="width:100%">
	<tr>	
    	<td>Name</td>
    	<td>Email</td>
        <td>Phone Number</td>
    	<td>Admin</td>
    	<td>Schedule Appointments</td>
  </tr>
@foreach ($users as $user)

	<tr>
    	<td><a href="/admin/viewuser/{{$user->id}}">{{ $user->name }}</a></td>
        <td>{{ $user->email }}</td>
    	<td>{{ $user->phone_number }}</td>		
        @if ($user->admin_site_id > 0)
        	<td>YES</td>
        @else
            <td>NO</td>
        @endif
       @if ($user->schedule_site_id > 0)
            <td>YES</td>
        @else
            <td>NO</td>
        @endif
  	</tr>

@endforeach
</table>

@stop