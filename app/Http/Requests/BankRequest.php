<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BankRequest extends FormRequest
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
                'name'       => 'required|',
                'code'       => 'unique:banks,code',
                'rif'        => 'required|unique:banks,rif|alpha_dash',
                'country_id' => 'required|',
                'url'        => 'required|unique:banks,url',
                'note'       => 'nullable',
            ];
        }else{
            return [
                'name'       => 'required|',
                'code'       => 'unique:banks,code',
                'rif'        => 'required|alpha_dash|unique:banks,rif,'.$this->route('bank.id'),
                'country_id' => 'required|',
                'url'        => 'required|unique:banks,url,'.$this->route('bank.id'),
                'note'       => 'nullable',
            ];
        }
        
    }
}
