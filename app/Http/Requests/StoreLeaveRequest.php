<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreLeaveRequest extends FormRequest
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
            //
            'user_id' => [
                'required',
            ],
            'reason' => [
                'required', 'string',
            ],
            'dateto' => [
                'required', 'after:datefrom'
            ],
            'datefrom' => [
                'required', 'before:dateto'
            ],
            'type' => [
                'required', 'string',
            ],
        ];
    }
}