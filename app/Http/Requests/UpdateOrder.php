<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateOrder extends FormRequest
{
    public function authorize()
    {
        return true;
    }
    
    public function rules()
    {
        return [
            'customer_id'               => 'required|exists:customers,id',                           
            'pastry_ids.*.pastry_id'    =>  'required|exists:pastels,id',
            'pastry_ids.*.amount'       => 'required|numeric|min:1'
        ];
    }
}
