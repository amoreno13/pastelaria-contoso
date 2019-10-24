<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePastry extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name'  => 'required',                           
            'price' => 'required|numeric',
            'file'  => 'required|mimetypes:image/jpeg,image/png',
        ];
    }
}
