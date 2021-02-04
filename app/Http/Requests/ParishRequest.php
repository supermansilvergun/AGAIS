<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ParishRequest extends FormRequest
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
                'code'            => "unique:parishes,code",
                'name'            => "required",
                'municipality_id' => "required",
                'url'             => "required|unique:parishes,url",
                'note'            => "nullable",
            ];
        }else{
            return [
                'code'            => "unique:parishes,code,".$this->route('parish.id'),
                'name'            => "required",
                'municipality_id' => "required",
                'url'             => "required|unique:parishes,url,".$this->route('parish.id'),
                'note'            => "nullable",
            ];
        }
    }
}
