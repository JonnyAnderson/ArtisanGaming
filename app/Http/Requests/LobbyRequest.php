<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class LobbyRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
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
            'title' => 'required|max:128|min:3',
            'description' => 'required',
            'game_slug' => 'required',
            'slots_available' => 'required|integer|max:15|min:1',
            'scheduled_time' => 'required|date_format:Y-m-d H:i:s|after:now',
            'security' => 'required|in:open,request,password',
            'password' => 'max:64|required_if:security,password'
        ];
    }

    public function messages()
    {
        return [
            'scheduled_time.after' => 'The scheduled time must be in the future.',
            'password.required_if' => 'A password is required if the lobby is password protected.'
        ];
    }
}
