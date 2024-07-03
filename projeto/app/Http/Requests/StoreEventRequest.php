<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventRequest extends FormRequest
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
            'title' => ['required', 'min:3', 'max:30'],
            'description' => ['required', 'min:3', 'max:500'],
            'init_date' => ['required', 'date'],
            'end_date' => ['required', 'date', 'after_or_equal:init_date'],
            'max_participants' => ['required', 'numeric', 'min:1'],
            'entry_price' => ['required', 'numeric', 'min:0'],
            'image' => ['required', 'mimes:jpg,png,jpeg'],
        ];
    }

    public function messages(): array {
        return [
            'title.required' => 'O título é obrigatório.',
            'description.required' => 'A descrição é obrigatória.',
            'init_date.required' => 'O evento não pode ser criado sem uma data de início.',
            'end_date.required' => 'O evento não pode ser criado sem uma data final.',
            'max_participants' => 'A quantidade máxima de participantes deve ser informada.',
            'entry_price.required' => 'É necessário informar o preço de entrada do evento.',
            'image.required' => 'A imagem principal do evento é obrigatória.',
            'title.required' => ':attribute é obrigatório.',

            'title.min' => 'O título deve possuir no mínimo 3 caracteres.',
            'title.max' => 'O título deve possuir no máximo 30 caracteres.',
            'description.min' => 'A descrição deve possuir no mínimo 3 caracteres.',
            'description.max' => 'A descrição deve possuir no máximo 500 caracteres.',

            'init_date.date' => 'A data de início do evento deve ser uma data válida.',
            'end_date.date' => 'A data de encerramento do evento deve ser uma data válida.',
            'end_date.after_or_equal' => 'A data de encerramento do evento não pode ser anterior a data de início.',
            'max_participants' => 'A quantidade máxima de um evento não pode ser menor que 1.',
            'entry_price.min' => 'O valor do evento não pode ser menor que R$0,00.',
            'entry_price.numeric' => 'O valor do evento deve ser um número.',
            'image.mimes' => 'Os formatos de imagens aceitos são: .jpg, .png e .jpeg',
        ];
    }
}
