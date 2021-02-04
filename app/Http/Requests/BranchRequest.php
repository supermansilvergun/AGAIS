<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BranchRequest extends FormRequest
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
                "code"         => 'unique:branches,code',
                "name"         => 'required|unique:branches,name',
                "display_name" => 'nullable',
                "url"          => 'required|unique:branches,url',
                "note"         => 'nullable',
            ];
        }else{
            return [
                "code"         => 'unique:branches,code,'.$this->route('branch.id'),
                "name"         => 'required|unique:branches,name,'.$this->route('branch.id'),
                "display_name" => 'nullable',
                "url"          => 'required|unique:branches,url,'.$this->route('branch.id'),
                "note"         => 'nullable',
            ];
        }
        
    }
}
