<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StateRequest extends FormRequest
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
                "code"          => "unique:states,code",
                "name"          => "required|",
                "iso"           => "required|string|min:4|max:5|unique:states,iso",
                "country_id"    => "required",
                "url"           => "required|unique:states,url",
                "note"          => "nullable",
            ];
        }else{
            return [
                "code"          => "unique:states,code,".$this->route('state.id'),
                "name"          => "required",
                "iso"           => "required|string|min:4|max:5|unique:states,iso,".$this->route('state.id'),
                "country_id"    => "required",
                "url"           => "required|unique:states,url,".$this->route('state.id'),
                "note"          => "nullable",
            ];
        }
    }
}
