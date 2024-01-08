<?php

namespace App\Http\Requests;

use App\Models\Item;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows('items_store');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'photo_file' => ['required', 'image', 'mimes:jpg,png,jpeg'],
            'code' => ['required', 'regex:/^[a-zA-Z0-9\-]+$/', 'unique:' . (new Item())->getTable() . ',code,NULL,id,deleted_at,NULL'],
            'name' => ['required', 'string', 'unique:' . (new Item())->getTable() . ',name,NULL,id,deleted_at,NULL'],
            'category_id' => ['required', 'integer'],
            'supplier_id' => ['required', 'integer'],
            'unit_id' => ['required', 'integer'],
            'cost_price' => ['required', 'numeric'],
            'selling_price' => ['required', 'numeric'],
        ];
    }
}
