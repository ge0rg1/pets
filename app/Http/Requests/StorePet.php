<?php

namespace App\Http\Requests;

use App\Models\PetType;
use Illuminate\Foundation\Http\FormRequest;

class StorePet extends FormRequest
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
            'type_id'     => 'required|integer|exists:'.PetType::getTableName().',id',
            'name'        => 'required|string',
            'description' => 'required|string',
        ];
    }
}
