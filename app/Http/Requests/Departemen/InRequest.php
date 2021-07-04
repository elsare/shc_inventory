<?php

namespace App\Http\Requests\Departemen;

use Illuminate\Foundation\Http\FormRequest;

class InRequest extends FormRequest
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
            'password' => ['required'],
            'jumlah' => ['required'],
        ];

        return $returns;
    }

    public function messages()
    {
        $returns = [
            'part_number_id.required' => 'Part No. Harus Di Pilih !',
            'departemen_id.required' => 'Departemen Harus Di Pilih !',
            'password.required' => 'Password Harus Di Isi !',
            'jumlah.required' => 'Jumlah Harus Di Isi !',
        ];
        
        return $returns;
    }
}
