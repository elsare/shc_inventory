<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class ModelRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {

        $returns = [
            'nama_model' => ['required']
        ];
        
        return $returns;
    }

    public function messages() {
        $returns = [
            'nama_model.required' => 'Nama Model Harus Diisi !',
        ];
        
        return $returns;
    }
}