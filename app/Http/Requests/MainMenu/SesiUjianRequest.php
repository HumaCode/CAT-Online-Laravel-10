<?php

namespace App\Http\Requests\MainMenu;

use App\Models\MainMenu\SesiUjian;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class SesiUjianRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function fillData(SesiUjian $sesi_ujian)
    {
        $sesi_ujian->fill([
            'name'          => $this->name,
            'time_start'    => $this->time_start,
            'time_end'      => $this->time_end,
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
            'name'          => ['required', Rule::unique('sesi_ujian')->ignore($this->sesi_ujian)],
            'time_start'    => 'required',
            'time_end'      => 'required',
        ];
    }
}
