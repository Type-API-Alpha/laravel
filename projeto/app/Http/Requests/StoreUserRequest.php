<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUserRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array {
        return [
            'name' => ['required', 'min:3'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'min:8'],
        ];
    }

    public function messages(): array {
        return [
            'name.required' => 'Nome é obrigatório',
            'name.min' => 'Nome deve possuir no mínimo 3 caracteres',
            'email.email' => 'Email inválido.',
            'email.required' => 'Email é obrigatório.',
            'email.unique' => 'Email inválido',
            'password.required' => 'Senha é obrigatória.',
            'password.min' => 'Senha deve possuir no mínimo 8 caracteres.',
        ];
    }
}
