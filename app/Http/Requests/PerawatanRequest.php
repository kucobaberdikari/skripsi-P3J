<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerawatanRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'id_pelanggan'=>'required|max:11',
            'nama'=>'required|max:255',
            'alamat'=>'required|max:255',
            'kodepos'=>'required|max:5',
            'telepon'=>'required|max:11',
            'email'=>'required|max:50',
            'perawatan'=>'required|max:255',
            'status' => 'nullable|string|in:PENDING,PROCESSED',
        ];
    }
}
