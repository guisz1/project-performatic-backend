<?php

declare(strict_types=1);

namespace Application\Http\Request;

use Hyperf\Validation\Request\FormRequest;

class CreateAccountRequest extends FormRequest
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
     */
    public function rules(): array
    {
        return [
            'email' => 'required|email|max:100|unique:users,email',
            'password' => 'required|string|min:8|max:60',
            'document' => 'required|document',
            'name' => 'required|string|min:8|max:255',
        ];
    }
}
