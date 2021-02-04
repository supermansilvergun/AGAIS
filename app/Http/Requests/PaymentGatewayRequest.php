<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PaymentGatewayRequest extends FormRequest
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
                'code'       => 'unique:payment_gateways,code',
                'name'       => 'required|unique:payment_gateways,name',
                'country_id' => 'required',
                'url'        => 'required|unique:payment_gateways,url',
                'note'       => 'nullable',
            ]; 
        }else{ 
            return [
                'code'       => 'unique:payment_gateways,code,'.$this->route('payment_gateway.id'),
                'name'       => 'required|unique:payment_gateways,name,'.$this->route('payment_gateway.id'),
                'country_id' => 'required',
                'url'        => 'required|unique:payment_gateways,url,'.$this->route('payment_gateway.id'),
                'note'       => 'nullable',
            ];
        }
        
    }
}
