<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PerbaikanRequest extends FormRequest
{

    public function authorize()
    {
        return true;
    }


    public function rules()
    {
        return [
            'id_pelanggan'=>'required|integer',
            'nama'=>'required|max:255',
            'alamat'=>'required|max:255',
            'kodepos'=>'required|integer',
            'telepon'=>'required|integer',
            'email'=>'required|max:50',
            'description'=>'required',
            'status' => 'nullable|string|in:PENDING,SUCCESS,FAILED',
        ];
    }
}
