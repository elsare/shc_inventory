<?php

namespace App\Http\Requests\Management;

use Illuminate\Foundation\Http\FormRequest;

class ProfileRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {

        $returns = [
            'name' => ['required'],
            'email' => ['required'],
            'image' => ['mimes:jpg, jpeg, png']
        ];
        
        return $returns;
    }

    public function messages() {
        $returns = [
            'name.required' => 'Nama Harus Diisi !',
            'email.required' => 'Email Harus Diisi !',
            'image.mimes' => 'File Harus Berbentuk jpg, jpeg, png !',
        ];
        
        return $returns;
    }
}
