<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
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
            'firstName'     => 'required|',
            'lastName'      => 'required',
            'email'         => 'required|unique:contacts',
            'date'          => 'required',
            'date'          => 'date_format:d/m/Y',
            'job'           => 'required',
            'company'       => 'required',
            'phone'         => 'unique:contacts',
            'cellphone'     => 'unique:contacts',
            'neighborhood'  => 'required',
            'city'          => 'required',
            'state'         => 'required',
            'obs'           => 'required'
        ];
    }

    public function messages()
    {
        return [
            'questao.required' => 'Campo questão é obrigatório',
            'questao.unique' => 'Questão já cadastrada',
            'disciplina_id.required' => 'Campo disciplina é obrigatório',
            'a.required' => 'Campo alternativa "a" é obrigatório',
            'b.required' => 'Campo alternativa "b" é obrigatório',
            'c.required' => 'Campo alternativa "c" é obrigatório',
            'd.required' => 'Campo alternativa "d" é obrigatório',
            'e.required' => 'Campo alternativa "e" é obrigatório',
            'correta.required' => 'Por favor, marque a resposta da questão',
            'nivel.required' => 'Por favor, marque o nivel da questão',
            
            'firstName.required'    => 'Campo nome é obrigatório',
            'lastName.required'     => 'Campo sorenome é obrigatório',
            'email.required'        => 'Campo email é obrigatório',
            'email.unique'          => 'Campo email é unico',
            'date.required'         => 'Campo nascimento é obrigatório',
            'date.date_format'      => 'Campo nascimento está com o formato inválido',
            'job.required'          => 'Campo cargo é obrigatório',
            'company.required'      => 'Campo empresa é obrigatório',
            'phone.required'        => 'Campo telefone é obrigatório',
            'phone.unique'          => 'Campo telefone é unico',
            'cellphone.required'    => 'Campo celular é obrigatório',
            'cellphone.unique'      => 'Campo celularé unico',
            'neighborhood.required' => 'Campo bairro é obrigatório',
            'city.required'         => 'Campo cidade é obrigatório',
            'state.required'        => 'Campo estado é obrigatório',
            'obs.required'          => 'Campo obs é obrigatório'
        ];
    }
}
