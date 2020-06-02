<?php

namespace App\Http\Requests\SiteSetting;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class StoreRequest extends FormRequest
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
            'key' => [
                "required",
                "min:2",
                "max:25",
                Rule::unique('site_settings', 'key')
                    ->whereNull('deleted_at')
            ],
            'value' => [
                "required",
                "min:1"
            ]
        ];
    }
}
