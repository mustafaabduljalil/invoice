<?php

namespace App\Http\Requests\API\Client;

use App\Models\Client;
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
            'email' => 'required|email|unique:clients,email|max:191',
            'mobile' => 'required|string|unique:clients,mobile',
            'preferred_communication_channel' => 'required|string|in:'.
                config('communication_channels.SMS_COMMUNICATION_CHANNEL').','.
                config('communication_channels.EMAIL_COMMUNICATION_CHANNEL'),
        ];
    }
}
