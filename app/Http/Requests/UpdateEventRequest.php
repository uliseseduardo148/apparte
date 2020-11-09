<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
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
            'primary_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
            'secondary_image' => 'image|mimes:jpeg,png,jpg,gif,svg|max:1024',
        ];
    }

    /**
     * Mensajes para las validaciones
     *
     * @return array
     */
    public function messages()
    {
        return [
            'title.required' => 'El título del evento es requerido.',
            'title.max' => 'El título no puede ser mayor a :max caracteres.',
            'event_schedule.required' => 'El horario del evento evento es requerido.',
            'event_schedule.max' => 'El horario del evento no puede ser mayor a :max caracteres.',
            'description.required' => 'La descripción es requerida.',
            'description.max' => 'La descripción no puede ser mayor a :max caracteres.',
            'primary_image.image' => 'La imagen principal debe ser en formato de imagen.',
            'primary_image.mimes' => 'La imagen principal debe ser en formato de jpeg,png,jpg,gif o svg.',
            'primary_image.max' => 'La imagen principal debe ser menor a :max kb.',
            'secondary_image.image' => 'La imagen secundaria debe ser en formato de imagen.',
            'secondary_image.mimes' => 'La imagen secundaria debe ser en formato de jpeg,png,jpg,gif o svg.',
            'secondary_image.max' => 'La imagen secundaria debe ser menor a :max kb.',
        ];
    }
}
