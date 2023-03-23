<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreReportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required',
            'user_id' => 'required',
            "city" => 'required',
            "description" => 'required',
            'image' => 'required', 'image',
            "report" => 'required', 'file',
            'tags' => 'required',
            'game' => 'required',
        ];
    }
}