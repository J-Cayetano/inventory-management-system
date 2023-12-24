<?php

namespace App\Http\Requests;

use App\Models\Category;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows((new Category())->getTable() . '_store');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'regex:/^[a-zA-Z0-9\-]+$/', 'unique:' . (new Category())->getTable() . ',code,NULL,id,deleted_at,NULL'],
            'title' => ['required', 'string', 'unique:' . (new Category())->getTable() . ',title,NULL,id,deleted_at,NULL']
        ];
    }
}
