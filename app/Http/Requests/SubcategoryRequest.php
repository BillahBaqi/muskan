<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class subcategoryRequest extends FormRequest
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
            'subcategory_name' => 'required',
            'category_id' => 'required',
        ];
    }
    public function messages()
    {
        return [
            'subcategory_name.required' => 'Plz Type a Subcategory',
            'category_id.required' => 'Select A Category',
        ];
    }
}
