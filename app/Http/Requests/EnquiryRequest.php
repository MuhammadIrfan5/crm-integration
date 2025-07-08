<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EnquiryRequest extends FormRequest
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
            'subscriberId' => 'required|uuid',
            'message' => 'required|string|max:500',
        ];
    }

    public function messages(): array
    {
        return [
            'subscriberId.required' => 'Subscriber ID is required.',
            'subscriberId.uuid' => 'Subscriber ID must be a valid UUID.',
            'message.required' => 'Message is required.',
            'message.string' => 'Message must be a string.',
            'message.max' => 'Message cannot exceed 500 characters.',
        ];
    }
}
