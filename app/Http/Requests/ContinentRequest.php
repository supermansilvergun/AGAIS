<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContinentRequest extends FormRequest
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
                'code'  => "unique:continents,code",
                'name'  => "required|unique:continents,name",
                'url'   => "required|unique:continents,url",
                "note"  => "nullable",
            ];
        }else{
            return [
                'code'  => "unique:continents,code",
                'name'  => "required|unique:continents,name,".$this->route('continent.id'),
                'url'   => "required|unique:continents,url,".$this->route('continent.id'),
                "note"  => "nullable",
            ];
        }
    }
}
