<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EmployeeRequest extends FormRequest
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
        if ($this->getMethod() == 'POST')
        {
            return [
                'code'                  => 'unique:employees,code',
                'name'                  => 'required|',
                'second_name'           => 'nullable',
                'last_name'             => 'required|',
                'second_last_name'      => 'nullable',
                'identification'        => 'required|numeric|unique:employees,identification',
                'document_id'           => 'required',
                'country_id'            => 'required|',
                'state_id'              => 'required|',
                'municipality_id'       => 'required|',
                'parish_id'             => 'required|',
                'email'                 => 'required|email:rfc,dns|unique:employees,email',
                'phone'                 => 'required|',
                'backup_phone'          => 'nullable',
                'birthday_date'         => 'required|',
                'gender'                => 'required|',
                'url'                   => 'required|',
                'role_id'               => 'required|',
                'avatar'                => 'nullable|',
                'note'                  => 'nullable',
                'address'               => 'required',
                'bank_id'               => 'required',
                'payment_gateway_id'    => 'required',
                "hire_date"             => 'required',
                "company_id"            => 'required',
                "wage"                  => 'nullable',
            ];
        }else{
            return [
                'code'                  => 'unique:employees,code',
                'name'                  => 'required|',
                'second_name'           => 'nullable',
                'last_name'             => 'required|',
                'second_last_name'      => 'nullable',
                'identification'        => 'required|numeric|unique:employees,identification,'.$this->route('employee.id'),
                'document_id'           => 'required',
                'country_id'            => 'required|',
                'state_id'              => 'required|',
                'municipality_id'       => 'required|',
                'parish_id'             => 'required|',
                'email'                 => 'required|email:rfc,dns|unique:employees,email,'.$this->route('employee.id'),
                'phone'                 => 'required|',
                'backup_phone'          => 'nullable',
                'birthday_date'         => 'required|',
                'gender'                => 'required|',
                'url'                   => 'required|',
                'role_id'               => 'required|',
                'avatar'                => 'nullable|',
                'note'                  => 'nullable',
                'address'               => 'required',
                'bank_id'               => 'required',
                'payment_gateway_id'    => 'required',
                "hire_date"             => 'required',
                "company_id"            => 'required',
                "wage"                  => 'nullable',
            ];
        }
        
    }
}