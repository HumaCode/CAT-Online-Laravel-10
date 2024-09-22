<?php

namespace App\Http\Requests\MainMenu;

use App\Models\MainMenu\ListSoal;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class ListSoalRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function fillData(ListSoal $listSoal)
    {
        $listSoal->fill([
            'type'         => $this->type,
            'kategori_id'  => $this->kategori_id,
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
            'type'          => ['required', 'in:pilgan,essay'],
            'kategori_id'   => ['required']
        ];
    }
}
