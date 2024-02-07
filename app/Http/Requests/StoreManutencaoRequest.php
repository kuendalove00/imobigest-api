<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreManutencaoRequest extends FormRequest
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
            'id_corrector' => 'required',
            'id_tecnico' => 'required',
            'descricao' => 'required',
            'estado' => 'required',
            'data_abertura' => 'required',
            'data_conclusao' => 'required'
        ];
    }
}
