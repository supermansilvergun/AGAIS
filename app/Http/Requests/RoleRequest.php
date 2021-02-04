<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
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
                "code"          => "unique:roles,code",
                "name"          => "required|alpha|unique:roles,name",
                "display_name"  => "required|alpha",
                "url"           => "required|unique:roles,url",
                "note"          => "nullable",
            ];
        }else{
            return [
                "code"          => "unique:roles,code",
                "name"          => "required|alpha|unique:roles,name,".$this->route('role.id'),
                "display_name"  => "requiredalpha",
                "url"           => "required|unique:roles,url,".$this->route('role.id'),
                "note"          => "nullable",
            ];
        }
    }
}
