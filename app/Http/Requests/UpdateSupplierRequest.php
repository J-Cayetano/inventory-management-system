<?php

namespace App\Http\Requests;

use App\Models\Supplier;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class UpdateSupplierRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows((new Supplier())->getTable() . '_update');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'email' => ['required', 'string'],
            'contact' => ['required', 'string'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
        ];
    }
}
