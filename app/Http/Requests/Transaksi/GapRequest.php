<?php

namespace App\Http\Requests\Transaksi;

use Illuminate\Foundation\Http\FormRequest;

class GapRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $returns = [
            'actual' => ['required'],
        ];

        return $returns;
    }

    public function messages()
    {
        $returns = [
            'actual.required' => 'Jumlah Actual Harus Diisi !',
        ];
        
        return $returns;
    }
}
