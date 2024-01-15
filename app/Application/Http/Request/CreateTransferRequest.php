<?php

declare(strict_types=1);

namespace Application\Http\Request;

use Hyperf\Validation\Request\FormRequest;

class CreateTransferRequest extends FormRequest
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
            'to_id' => 'required|exists:users,id',
            'amount' => 'required|decimal:2',
        ];
    }
}
