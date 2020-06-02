<?php

namespace App\Http\Requests\SiteSetting;

use Illuminate\Foundation\Http\FormRequest;
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
        $id = $this->route('tag');

        return [
            'key' => [
                "required",
                "min:2",
                "max:25",
                Rule::unique('site_settings', 'key')
                    ->ignore($id)
                    ->whereNull('deleted_at')
            ],
            'value' => [
                "required",
                "min:1"
            ]
        ];
    }
}
