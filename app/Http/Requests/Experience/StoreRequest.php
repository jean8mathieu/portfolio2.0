<?php

namespace App\Http\Requests\Experience;

use Illuminate\Foundation\Http\FormRequest;

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
            'position' => "required|min:3|max:100",
            'company_name' => "required|min:3|max:100",
            'started_at' => "required|date",
            'ended_at' => "nullable|date",
            'location' => "nullable|min:3|max:100",
            'description' => "required|min:20"
        ];
    }
}
