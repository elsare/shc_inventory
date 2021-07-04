<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class PartNumberRequest extends FormRequest
{
    
    public function authorize()
    {
        return true;
    }

    public function rules() {

        $returns = [
            'part_no' => ['required'],
            'description' => ['required'],
            'model_id'     => ['required']
        ];
        
        return $returns;
    }

    public function messages() {
        $returns = [
            'part_no.required' => 'Part Number Harus Diisi !',
            'description.required' => 'Description Harus Diisi !',
            'model_id.required' => 'Model Harus Dipilih !',
        ];
        
        return $returns;
    }
}
