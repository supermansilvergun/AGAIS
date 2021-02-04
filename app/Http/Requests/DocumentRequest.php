<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DocumentRequest extends FormRequest
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
                "code"      =>   'unique:documents,code',
                "name"      =>   'required',
                "acronym"   =>   'required|unique:documents,acronym',
                "url"       =>   'required|unique:documents,url',
                "note"      =>   'nullable',
            ];
        }else{
            return [
                "code"      =>   'unique:documents,code',
                "name"      =>   'required',
                "acronym"   =>   'required|unique:documents,acronym,'.$this->route('document.id'),
                "url"       =>   'required|unique:documents,url,'.$this->route('document.id'),
                "note"      =>   'nullable',
            ];
        }
    }
}
