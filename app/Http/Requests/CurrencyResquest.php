<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CurrencyResquest extends FormRequest
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
                'code'       => 'unique:currencies,code',
                'name'       => 'required',
                'symbol'     => 'required',
                'iso'        => 'nullable|unique:currencies,iso|min:3|max:6|alpha_dash',
                'country_id' => 'required',
                'url'        => 'required|unique:currencies,url',
                'note'       => 'nullable',
            ];
        }else{
            return [
                'code'       => 'unique:currencies,code,'.$this->route('currency.id'),
                'name'       => 'required',
                'symbol'     => 'required',
                'iso'        => 'nullable||min:3|max:6|alpha_dash|unique:currencies,iso,'.$this->route('currency.id'),
                'country_id' => 'required',
                'url'        => 'required|unique:currencies,url,'.$this->route('currency.id'),
                'note'       => 'nullable',
            ];
        }
        
    }
}
