<?php

namespace Application\Requests\User;

use Illuminate\Foundation\Http\FormRequest;

class UpdateUsernameRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'username' => 'required|string|unique:users,username',
        ];
    }
}
