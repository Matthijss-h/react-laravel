<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateParticipantRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'name' => ['sometimes', 'required', 'string', 'max:255'],
            'short_description' => ['nullable', 'string', 'max:1000'],
            'participant_type_id' => ['sometimes', 'required', 'integer', 'exists:participant_types,id'],
            'layer_id' => ['sometimes', 'required', 'integer', 'exists:layers,id'],
            'website' => ['nullable', 'url', 'max:255'],
            'email' => ['nullable', 'email', 'max:255'],
            'phone' => ['nullable', 'string', 'max:255'],
            'is_active' => ['boolean'],
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'De naam is verplicht.',
            'participant_type_id.exists' => 'Dit participanttype bestaat niet.',
            'layer_id.exists' => 'Deze laag bestaat niet.',
            'email.email' => 'Voer een geldig e-mailadres in.',
            'website.url' => 'Voer een geldige URL in.',
        ];
    }
}
