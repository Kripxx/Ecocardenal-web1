<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ValidadorRegistro extends FormRequest
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
            'nombreUsuario' => 'required|min:4|max:255',
            'txtnombre' => 'required|min:4|max:255',
            'txtapellido' => 'required|min:4|max:255',
            'correo' => 'required|email:rfc,dns',
            'password' => 'required|min:8',
        ];
    }
}
