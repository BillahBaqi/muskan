<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
     * @return array
     */
    public function rules()
    {
      
        return [
            'category_name' => "required | unique:categories,category_name,". $this->category_id,
            'category_photo' => "image",
        ];
    }

    public function messages()
    {
        return [
            'category_name.required' => 'Please Type Your Category Name',
            'category_name.unique' => 'This Category Already Exist',
        ];
    }
}
