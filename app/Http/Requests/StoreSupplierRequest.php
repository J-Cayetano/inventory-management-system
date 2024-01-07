<?php

namespace App\Http\Requests;

use App\Models\Supplier;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows((new Supplier())->getTable() . '_store');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'regex:/^[a-zA-Z0-9\-]+$/', 'unique:' . (new Supplier())->getTable() . ',code,NULL,id,deleted_at,NULL'],
            'name' => ['required', 'string', 'unique:' . (new Supplier())->getTable() . ',name,NULL,id,deleted_at,NULL'],
            'email' => ['required', 'string', 'unique:' . (new Supplier())->getTable() . ',email,NULL,id,deleted_at,NULL'],
            'contact' => ['required', 'string', 'unique:' . (new Supplier())->getTable() . ',contact,NULL,id,deleted_at,NULL'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
        ];
    }
}
