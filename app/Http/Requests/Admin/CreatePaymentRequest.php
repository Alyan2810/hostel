<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class CreatePaymentRequest extends FormRequest
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
            'payment_ammount' => 'required|digits_between:3,11',
            'payment_mode' => 'required',
            'for_month' => 'required',
            'payment_description' => 'nullable',
            'payment_date' => 'required',
            'is_pending_payment' => 'nullable',
           // 'payment_date' => 'date_format:m/d/Y'
        ];
    }
}
