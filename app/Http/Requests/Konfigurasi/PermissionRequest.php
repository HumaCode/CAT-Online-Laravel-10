<?php

namespace App\Http\Requests\Konfigurasi;

use App\Models\Permission;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PermissionRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    public function fillData(Permission $permission)
    {
        $permission->fill([
            'name'          => $this->name,
            'guard_name'    => $this->guard_name,
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
            'name'          => ['required', Rule::unique('permissions')->ignore($this->permission)],
            'guard_name'    => ['required']
        ];
    }
}
