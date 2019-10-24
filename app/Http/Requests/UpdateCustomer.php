<?php

namespace App\Http\Requests;

use App\Rules\PhoneNumber;
use App\Rules\ZipCode;
use Illuminate\Foundation\Http\FormRequest;

class UpdateCustomer extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {        
        return [
            'name'          => 'required', 
            'email'         => 'required|email|unique:customers,email,' . $this->customer, 
            'phone'         => ['required', new PhoneNumber],
            'birth_date'    => 'required|date', 
            'address'       => 'required',             
            'neighborhood'  => 'required', 
            'zip_code'      => ['required', new ZipCode],                
        ];
    }
}
