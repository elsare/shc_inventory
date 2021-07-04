<?php

namespace App\Http\Requests\Transaksi;

use Illuminate\Foundation\Http\FormRequest;

class OutputRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        $returns = [
            'part_number_id' => ['required'],
            'departemen_id' => ['required'],
            'jumlah' => ['required'],
        ];

        return $returns;
    }

    public function messages()
    {
        $returns = [
            'part_number_id.required' => 'Part No. Harus Di Pilih !',
            'departemen_id.required' => 'Departemen Harus Di Pilih !',
            'jumlah.required' => 'Jumlah Harus Di Isi !',
        ];
        
        return $returns;
    }
}
