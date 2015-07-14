<!-- resources/views/appointments/create.blade.php -->

<form method="POST" action="/appointments/create">
    {!! csrf_field() !!}


    <div>
        Appointment With
        <select name="appt_with_id">
            @foreach ($apptpeople as $apptperson)
                <option value="{{ $apptperson->id  }}"> {{ $apptperson->name  }}</option>

            @endforeach

        </select>
    </div>
    <div>
        Comments
        <input type="text" name="comments">
    </div>

    <div>
        Date
        <input type="date" name="appt_date">
    </div>

    <div>
        Start Hour
        <select name="appt_start_hour">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
        </select>
    </div>

        <div>
        Start Minute
        <select name="appt_start_minute">
            <option value="0">0</option>
            <option value="30">30</option>
        </select>
    </div>
    <div>
        End Hour
        <select name="appt_end_hour">
            <option value="0">0</option>
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
            <option value="6">6</option>
            <option value="7">7</option>
            <option value="8">8</option>
            <option value="9">9</option>
            <option value="10">10</option>
            <option value="11">11</option>
            <option value="12">12</option>
            <option value="13">13</option>
            <option value="14">14</option>
            <option value="15">15</option>
            <option value="16">16</option>
            <option value="17">17</option>
            <option value="18">18</option>
            <option value="19">19</option>
            <option value="20">20</option>
            <option value="21">21</option>
            <option value="22">22</option>
            <option value="23">23</option>
        </select>
    </div>

        <div>
        End Minute
        <select name="appt_end_minute">
            <option value="0">0</option>
            <option value="30">30</option>
        </select>
    </div>

    <div>
        1 Day SMS/Text Reminder
        <input type="radio" name="sms_1day" value="1"> Yes

        <input type="radio" name="sms_1day" value="0" checked> No
    </div>

    <div>
        1 Hour SMS/Text Reminder
        <input type="radio" name="sms_1hour" value="1"> Yes

        <input type="radio" name="sms_1hour" value="0" checked> No
    </div>

    <div>
        <button type="submit">Create Appointment</button>
    </div>
</form>