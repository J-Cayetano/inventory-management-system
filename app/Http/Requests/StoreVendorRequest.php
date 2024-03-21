<?php

namespace App\Http\Requests;

use App\Models\Vendor;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class StoreVendorRequest extends FormRequest
{
    public $table;

    public function __construct(
        public Vendor $model,
    ) {
        $this->table = $this->model->getTable();
    }
    
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return Gate::allows($this->table . '_store');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'code' => ['required', 'regex:/^[a-zA-Z0-9\-]+$/', 'unique:' . $this->table . ',code,NULL,id,deleted_at,NULL'],
            'name' => ['required', 'string', 'unique:' . $this->table . ',name,NULL,id,deleted_at,NULL'],
            'email' => ['required', 'string', 'unique:' . $this->table . ',email,NULL,id,deleted_at,NULL'],
            'contact' => ['required', 'string', 'unique:' . $this->table . ',contact,NULL,id,deleted_at,NULL'],
            'city' => ['required', 'string'],
            'address' => ['required', 'string'],
        ];
    }
}
