<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRelationRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'from_participant_id' => [
                'required',
                'integer',
                'exists:participants,id',
            ],
            'to_participant_id' => [
                'required',
                'integer',
                'exists:participants,id',
                'different:from_participant_id',
            ],
            'relation_type_id' => [
                'required',
                'integer',
                'exists:relation_types,id',
            ],
            'description' => [
                'nullable',
                'string',
                'max:1000',
            ],
        ];
    }

    public function messages(): array
    {
        return [
            'to_participant_id.different' => 'Je kunt geen relatie naar jezelf maken.',
            'from_participant_id.exists' => 'Deze deelnemer (van) bestaat niet.',
            'to_participant_id.exists' => 'Deze deelnemer (naar) bestaat niet.',
            'relation_type_id.exists' => 'Dit relatietype bestaat niet.',
        ];
    }
}
