<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BlogInsertRequest extends FormRequest {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules() {
        return [
            "title" => "bail|required|unique:blogs|max:255",
            "description" => "required"
        ];
    }

}
