<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MunicipalityRequest extends FormRequest
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
                'code'     => "unique:municipalities,code",
                'name'     => "required",
                'state_id' => "required",
                'url'      => "required|unique:municipalities,url",
                'note'     => "nullable",
            ];
        }else{
            return [
                'code'     => "unique:municipalities,code,".$this->route('municipality.id'),
                'name'     => "required",
                'state_id' => "required",
                'url'      => "required|unique:municipalities,url,".$this->route('municipality.id'),
                'note'     => "nullable",
            ];
        }
    }
}
