<?php

namespace App\Http\Requests\API\ClientInvoice;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
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
            'full_name' => 'required|string|max:191',
            'email' => 'required|email|max:191',
            'mobile' => 'required|string',
            'amount' => 'required|string',
            'due_date' => 'required|date|date_format:Y-m-d',
            'preferred_communication_channel' => 'required|string|in:'.
                config('communication_channels.SMS_COMMUNICATION_CHANNEL').','.
                config('communication_channels.EMAIL_COMMUNICATION_CHANNEL'),
        ];
    }
}
