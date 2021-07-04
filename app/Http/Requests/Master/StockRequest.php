<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $returns = [
            'part_number_id' => ['required'],
        ];

        return $returns;
    }

    public function messages()
    {
        $returns = [
            'part_number_id.required' => 'Part No. Harus Di Pilih !',
        ];
        
        return $returns;
    }
}
