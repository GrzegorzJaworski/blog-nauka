<?php

namespace App\Http\Requests;

use App\User;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Hash;

class RegistrationForm extends FormRequest
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
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ];
    }

    public function persist()
    {
        $user = User::create([
                'name' => $this->get('name'),
                'email' => $this->get('email'),
                'password' => Hash::make($this->get('password')),
            ]
        );

        auth()->login($user);
    }
}
