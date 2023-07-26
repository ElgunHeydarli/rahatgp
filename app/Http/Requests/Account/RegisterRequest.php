<?php

namespace App\Http\Requests\Account;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'email' => 'required|email',
            'name' => 'required',
            'password' => 'required|min:8',
            'confirm_password' => 'same:password',
        ];
    }

    public function messages()
    {
        return [
            'email.required' => 'Email tələb olunur',
            'email.email' => 'Emaili düzgün formatda daxil edin',
            'name.required' => 'İstifadəçi adı tələb olunur',
            'password.required' => 'Şifrə tələb olunur',
            'password.min' => 'Şifrənin uzunluğu ən azı :min simvoldan ibarət olmalıdır',
            'confirm_password.same' => 'Şifrəni təsdiqləyin',
        ];
    }
}
