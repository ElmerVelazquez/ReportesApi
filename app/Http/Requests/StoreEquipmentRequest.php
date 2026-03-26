<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Rules\StrictInteger;

class StoreEquipmentRequest extends FormRequest
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
            'equipment_type_id' => 'required|strict_integer|exists:equipment_types,id',
            'equipment_brand_id' => 'required|strict_integer|exists:equipment_brands,id',
            'equipment_model_id' =>'required|strict_integer|exists:equipment_models,id',
            'serial' => 'required|strict_string|max:255|unique:equipment,serial',
            'equipment_status_id' => 'required|strict_integer|exists:equipment_statuses,id',
            'comment' => 'strict_string|max:255',
        ];
    }
}
