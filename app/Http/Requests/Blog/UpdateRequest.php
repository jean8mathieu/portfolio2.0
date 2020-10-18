<?php

namespace App\Http\Requests\Blog;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\Rule;

class UpdateRequest extends FormRequest
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
        $rules = [
            'title' => "required|min:4|max:255",
            'summary' => "required|min:5|max:255",
            'description' => "required|min:50|max:1000",
            'cover' => "nullable|image",
        ];

        foreach ($this->request->get('tag') ?? [] as $key => $val) {
            $rules["tag.{$key}"] = Rule::exists('tags', 'id')->where('id', $val);
        }

        return $rules;
    }
}
