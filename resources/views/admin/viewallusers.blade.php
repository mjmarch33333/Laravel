@extends('loggedinmaster')

@section('title')
    Users
@stop

@section('content')

<table class="table responsive-table" id="sorting-advanced">
    <thead>
        <tr>
            <th scope="col"width="30%" class="align-center">Name</th>
            <th scope="col" width="15%" class="align-center">Email</th>
            <th scope="col" width="15%" class="align-center">Phone Number</th>
            <th scope="col" width="15%" class="align-center">Date of Birth</th>
            <th scope="col" width="20" class="align-center">Admin</th>
            <th scope="col" width="20" class="align-center">Schedule</th>
            <th scope="col" width="45" class="align-center">Action</th>
        </tr>
    </thead>
<tbody>
@foreach ($users as $user)

    <tr>
        <td>{{ $user->name }}</td>
        <td>{{ $user->email }}</td>
        <td>{{ $user->phone_number }}</td>      
        <td>{{ $user->date_of_birth }}</td>  
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
        <td class="low-padding align-center">
            <a href="/admin/viewuser/{{$user->id}}" title = "Edit" class="button compact icon-gear"></a>
            <a href="/admin/viewuser/{{$user->id}}" title = "Appointments" class="button compact icon-read"></a>
        </td>
    </tr>

@endforeach
    </tbody>

</table>

@stop
