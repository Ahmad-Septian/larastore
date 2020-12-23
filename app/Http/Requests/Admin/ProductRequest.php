<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'nama' => 'required|max:255',
            'harga' => 'required|max:255',
            'stok' => 'required|max:255',
            'jenis_bahan' => 'required',
            'berat'=> 'required',
            'gambar'=>'required|image',
            'kategori_id' =>'required|integer|exists:kategoris,id',
            'size' => 'string|in:S,M,L,XL'
        ];
    }
}
