<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SubscriberRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    // validation rules for the subscriber request
    public function rules(): array
    {
        return [
            'email' => 'required|email',
            'first_name' => 'nullable|string|max:255',
            'last_name' => 'nullable|string|max:255',
            'date_of_birth' => ['required', 'date_format:Y-m-d','date', 'before:-18 years'],
            'marketing_consent' => 'nullable|in:true,false,1,0',
            'lists' => 'nullable|array',
            'lists.*' => 'string',
        ];
    }

    // custom validation messages
    public function messages(): array
    {
        return [
            'email.required' => 'Email is required.',
            'email.email' => 'Please provide a valid email address.',
            'date_of_birth.required' => 'Date of birth is required.',
            'date_of_birth.date' => 'Please provide a valid date.',
            'date_of_birth.before' => 'You must be at least 18 years old to subscribe.',
            // 'lists.array' => 'Cities must be an array of city IDs.',
        ];
    }

}
