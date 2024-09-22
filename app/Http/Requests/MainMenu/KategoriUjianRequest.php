<?php

namespace App\Http\Requests\MainMenu;

use App\Models\MainMenu\KategoriUjian;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;

class KategoriUjianRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function fillData(KategoriUjian $kategori_ujian)
    {
        $kategori_ujian->fill([
            'kategori'     => ucwords($this->kategori),
            'user_id'      => Auth::user()->id,
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
            'kategori'    => ['required', Rule::unique('kategori_ujian')->ignore($this->kategori_ujian)],
        ];
    }
}
