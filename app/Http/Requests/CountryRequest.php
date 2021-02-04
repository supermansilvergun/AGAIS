<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CountryRequest extends FormRequest
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
                'name'         => "required|unique:countries,name",
                'code'         => "unique:countries,code",
                'iso2'         => "required|unique:countries,iso2|min:2|max:2|",
                'iso3'         => "required|unique:countries,iso3|min:3|max:3|",
                'continent_id' => "required",
                'url'          => "required|unique:countries,url|string",
                'note'         => "nullable",
            ];
        }else{ 
            return [
                'name'         => "required|unique:countries,name,".$this->route('country.id'),
                'code'         => "unique:countries,code",
                'iso2'         => "required|min:2|max:2|unique:countries,iso2,".$this->route('country.id'),
                'iso3'         => "required|min:3|max:3|unique:countries,iso3,".$this->route('country.id'),
                'continent_id' => "required",
                'url'          => "required|unique:countries,url,".$this->route('country.id'),
                'note'         => "nullable",
            ];
        }
    }
}
