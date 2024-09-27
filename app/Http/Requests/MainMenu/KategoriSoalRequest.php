<?php

namespace App\Http\Requests\MainMenu;

use App\Models\MainMenu\KategoriSoal;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class KategoriSoalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function fillData(KategoriSoal $kategoriSoal)
    {
        $kategoriSoal->fill([
            'kategori_soal'     => ucwords($this->kategori),
        ]);
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'kategori_soal'    => ['required', Rule::unique('kategori_soal')->ignore($this->kategori_soal)],
        ];
    }
}
