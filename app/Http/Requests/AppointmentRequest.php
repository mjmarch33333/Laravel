<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AppointmentRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {

        $admin = \Auth::user()->admin_site_id;
        if ($admin < 1)
        {
             return false;
        }
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'sms_1hour' => 'required',
            'sms_1day' => 'required',
            'appt_start_hour' => 'required',
            'appt_start_minute' => 'required',
            'appt_date' => 'required',
            'appt_with_id' => 'required'
        ];
    }
}
