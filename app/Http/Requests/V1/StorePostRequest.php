<?php

namespace App\Http\Requests\V1;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StorePostRequest extends FormRequest
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
            "title" => ['required'],
            'slug' => ['required'],
            'description' => ['required'],
            'content' => [],
            'categoryId' => ['required'],
            'user_id' => ['required'],
            'status' => ['required', Rule::in(['publish', 'unpublish'])],
            "time" => [],
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'category_id' => $this->categoryId,
            'user_id' => $this->userId,
        ]);
    }



}