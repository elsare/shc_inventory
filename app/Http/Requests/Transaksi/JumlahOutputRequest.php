<?php

namespace App\Http\Requests\Transaksi;

use Illuminate\Foundation\Http\FormRequest;

class JumlahOutputRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $returns = [
            'departemen_id' => ['required'],
        ];

        return $returns;
    }

    public function messages()
    {
        $returns = [
            'departemen_id.required' => 'Departemen Harus Di Pilih !',
        ];
        
        return $returns;
    }
}
