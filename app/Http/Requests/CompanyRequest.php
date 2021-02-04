<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CompanyRequest extends FormRequest
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
                'code'         => 'unique:companies,code',
                'name'         => 'required|unique:companies,name',
                'rif'          => 'required|unique:companies,rif',
                'scope'        => 'required',
                'type'         => 'required',
                'country_id'   => 'required',
                'state_id'     => 'required',
                'address'      => 'required',
                'email'        => 'required|unique:companies,email',
                'phone'        => 'required',
                'backup_phone' => 'nullable',
                'web_site'     => 'nullable',
                'url'          => 'required|unique:companies,url',
                'branch_id'    => 'required',
                'note'         => 'nullable',
            ];
        }else{
            return [
                'code'         => 'unique:companies,code,'.$this->route('company.id'),
                'name'         => 'required|unique:companies,name,'.$this->route('company.id'),
                'rif'          => 'required|unique:companies,rif,'.$this->route('company.id'),
                'scope'        => 'required',
                'type'         => 'required',
                'country_id'   => 'required',
                'state_id'     => 'required',
                'address'      => 'required',
                'email'        => 'required|unique:companies,email,'.$this->route('company.id'),
                'phone'        => 'required',
                'backup_phone' => 'nullable',
                'web_site'     => 'nullable',
                'url'          => 'required|unique:companies,url,'.$this->route('company.id'),
                'branch_id'    => 'required',
                'note'         => 'nullable',
            ];
        }
    }
}
