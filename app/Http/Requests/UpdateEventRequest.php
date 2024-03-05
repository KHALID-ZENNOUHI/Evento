<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|text',
            'category_id' => 'required|numeric|exists:categories,id',
            'start_date' => 'required|date',
            'adress' => 'required|string|max:255',
            'image' => 'image',
            'type' => 'required|in:automatique_reservation,manual_reservation',
            'status' => 'required|in:accepted,rejected,pending',
            'places' => 'required|numeric',
        ];
    }
}
