<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePastry extends FormRequest
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
            'image' => 'required',
            'file'  => 'mimetypes:image/jpeg,image/png',
        ];
    }
}
