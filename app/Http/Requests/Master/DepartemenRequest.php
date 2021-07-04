<?php

namespace App\Http\Requests\Master;

use Illuminate\Foundation\Http\FormRequest;

class DepartemenRequest extends FormRequest
{
    public function authorize() {
        return true;
    }

    public function rules() {

        $returns = [
            'nama_departemen' => ['required'],
            'password'        => ['required', 'min:6'] 
        ];
        
        return $returns;
    }

    public function messages() {
        $returns = [
            'nama_departemen.required' => 'Nama Departemen Harus Diisi !',
            'password.required' => 'Password Harus Diisi !',
        ];
        
        return $returns;
    }
}
