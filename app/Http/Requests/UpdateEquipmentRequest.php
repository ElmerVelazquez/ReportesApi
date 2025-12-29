<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateEquipmentRequest extends FormRequest
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
    public function rules(): array
    {
        return [
            'equipment_type_id' => 'strict_integer|exists:equipment_types,id',
            'brand' => 'string|max:255',
            'model' =>'string|max:255',
            'serial' => 'string|max:255|unique:equipment,serial',
            'equipment_status_id' => 'integer|exists:equipment_statuses,id',
            'comment' => 'string|max:255',
        ];
    }
}
