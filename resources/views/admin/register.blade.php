<!-- resources/views/admin/register.blade.php -->

@extends('loggedinmaster')


@section('title')
    Create New User
@stop

@section('content')

<form method="POST" action="/admin/createnewuser">
    {!! csrf_field() !!}

    <div class="col-md-6">
        First Name
        <input type="text" name="first_name">
    </div>

    <div class="col-md-6">
        Middle Name
        <input type="text" name="middle_name">
    </div>

    <div class="col-md-6">
        Last Name
        <input type="text" name="last_name">
    </div>
    <div class="col-md-6">
        Date of Birth
        <input type="date" name="date_of_birth">
    </div>
    
    <div>
        Email
        <input type="email" name="email">
    </div>

    <div class="col-md-6">
        Phone Number
        <input type="text" name="phone_number">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div class="col-md-6">
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>

@stop