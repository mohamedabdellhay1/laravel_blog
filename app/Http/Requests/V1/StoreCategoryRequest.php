<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreCategoryRequest extends FormRequest
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
        return [
            "name" => ['required'],
            'slug' => ['required'],
            'createdBy' => ['required'],
            'parentId' => [],
        ];
    }
    protected function prepareForValidation()
    {
        $this->merge([
            'parent_id' => $this->parentId,
            'created_by' => $this->createdBy,
        ]);
    }
}