<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {

        return [

            // Validation rules for unique code and department//

            'code' => [
                'required',
                Rule::unique('items')->where(function ($query) {
                    return $query->where('department_id', $this->department_id);
                }),
            ],
            'name' => 'required',
            'itemcategory_id' => 'nullable',
            'supplier_id' => 'nullable',
            'location_id' => 'required',
            'department_id' => 'required',
        ];
    }
}
