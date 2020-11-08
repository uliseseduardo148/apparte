<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EvenRequest extends FormRequest
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
            'title' => 'required|string|max:50',
            'event_schedule' => 'required|string|max:50',
            'description' => 'required|string|max:150',
            'primary_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'secondary_image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];
    }
}
