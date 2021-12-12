<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
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
            'name' => 'required',
            'telefone' => 'required',
            'email' => 'required|email',
            'message' => 'required',
        ];
    }

    public function messages(){
        return [
            'name' => 'O campo nome é obrigatório.',
            'telefone' => 'O campo do telefone é obrigatório',
            'email' => 'Digite o email em formato válido',
            'message.required' => 'O campo de mensagem é obrigatório',
        ];
    }
}
