<?php

namespace Modules\PostgreSQL\Http\Request\Kuliah;

use Illuminate\Foundation\Http\FormRequest;

class CreateKuliahRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'dosen'       => 'required',
            'mahasiswa'   => 'required',
            'mataKuliah'  => 'required',
            'nilai'       => 'required|integer',
        ];
    }
}
