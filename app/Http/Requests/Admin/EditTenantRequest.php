<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class EditTenantRequest extends FormRequest
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
            'tenant_name' => 'required',
           // 'tenant_nid' => 'required|unique:tenants|integer|digits_between:10,14',
           'room_no' => 'required',
           'security_ammount' => 'nullable',
           'admission_date' => 'required',
           'father_name' => 'required',
          // 'father_nid' => 'nullable|integer|digits_between:10,14',
          //'dob' => 'date_format:Y-m-d|nullable',   just for exp
            'permanent_add' => 'required',
            'police_station' => 'required',
            'police_chowki' => 'nullable',
            'contact_no' => 'required|digits_between:6,11',
            'father_contact_no' => 'nullable|digits_between:6,11',
            'emergency_contact_no' => 'required|digits_between:6,11',
            'institue' => 'nullable',
            'institue_role' => 'nullable',
            'duration' => 'nullable',
            'redg_no' => 'nullable',
            'living_before' => 'nullable',
            'reletive_name' => 'nullable',
            'is_active' => 'nullable',
            'relative_phone' => 'nullable|digits_between:6,11',
            'image'     => 'nullable|image|dimensions:max_width=300,max_height=300',
            'id_image'     => 'nullable|image|dimensions:max_width=400,max_height=400',
            'category'  => 'required|integer|exists:categories,id',
            'mypackage'  => 'required|integer|exists:mypackages,id'
      
        ];
    }
}
