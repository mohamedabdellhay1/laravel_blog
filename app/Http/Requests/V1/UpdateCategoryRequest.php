<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class UpdateCategoryRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $method = $this->method();
        if ($method == "PUT") {
            return [
                "name" => ['required'],
                'slug' => ['required'],
                "status" => ['required', Rule::in(['active', 'disabled'])],
                'updatedBy' => ['required'],
                "parentId" => []
            ];
        } else {
            return [
                "name" => ['sometimes', 'required'],
                'slug' => ['sometimes', 'required'],
                'updatedBy' => ['sometimes', 'required'],
                "status" => ['sometimes', 'required', Rule::in(['active', 'disabled'])],
                "parentId" => ['sometimes', 'required']
            ];
        }

    }
    protected function prepareForValidation()
    {
        $this->merge([
            'parent_id' => $this->parentId,
            'updated_by' => $this->updatedBy,
        ]);
    }
}