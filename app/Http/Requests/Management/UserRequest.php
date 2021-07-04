<?php

namespace App\Http\Requests\Management;

use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
   
    public function authorize()
    {
        return true;
    }

    public function rules() {

        $returns = [
            'name' => ['required','max:255'],
            'email' => ['required','email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ];
        
        return $returns;
    }

    public function messages() {
        $returns = [
            'name.required' => 'Nama Harus Diisi !',
            'email.required' => 'Email Harus Diisi !',
            'email.unique' => 'Email Sudah Digunakan !',
            'email.email' => 'Contoh penulisan email name@example.com !',
            'password.required' => 'Password Harus Diisi !',
            'password.min' => 'Password Min 8 !',
            'password.confirmed' => 'Konfirmasi Password Tidak Cocok !',
        ];
        
        return $returns;
    }
}
