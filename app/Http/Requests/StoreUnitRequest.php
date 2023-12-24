<?php

namespace App\Http\Requests;

use App\Models\Unit;
use Illuminate\Support\Facades\Gate;
use Illuminate\Foundation\Http\FormRequest;

class StoreUnitRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows((new Unit())->getTable() . '_store');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'regex:/^[a-zA-Z0-9\-]+$/', 'unique:' . (new Unit())->getTable() . ',code,NULL,id,deleted_at,NULL'],
            'title' => ['required', 'string', 'unique:' . (new Unit())->getTable() . ',title,NULL,id,deleted_at,NULL']
        ];
    }
}
