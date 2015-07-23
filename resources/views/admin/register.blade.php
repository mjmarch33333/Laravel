<!-- resources/views/admin/register.blade.php -->

<form method="POST" action="/admin/createnewuser">
    {!! csrf_field() !!}

    <div class="col-md-6">
        Name
        <input type="text" name="name" value="{{ old('name') }}">
    </div>

    <div>
        Email
        <input type="email" name="email" value="{{ old('email') }}">
    </div>

    <div>
        Password
        <input type="password" name="password">
    </div>

    <div class="col-md-6">
        Confirm Password
        <input type="password" name="password_confirmation">
    </div>

    <div class="col-md-6">
        Phone Number
        <input type="text" name="phone_number" value="{{ old('phone_number') }}">
    </div>

    <div>
        <button type="submit">Register</button>
    </div>
</form>