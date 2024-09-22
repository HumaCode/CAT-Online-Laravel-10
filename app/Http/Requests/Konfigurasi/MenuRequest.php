<?php

namespace App\Http\Requests\Konfigurasi;

use App\Models\Konfigurasi\Menu;
use Illuminate\Foundation\Http\FormRequest;

class MenuRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function fillData(Menu $menu)
    {
        $menu->fill([
            'name'          => $this->name,
            'url'           => $this->url,
            'orders'        => $this->orders,
            'icon'          => $this->icon,
            'category'      => $this->category,
            'main_menu_id'  => $this->main_menu,
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
            'name'      => 'required',
            'url'       => 'required',
            'orders'    => 'required|integer',
        ];
    }
}
