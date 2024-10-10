<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan("create");
    }

    public function rules(): array
    {
        return [
            "description" => ["required"],
        ];
    }

    public function prepareForValidation()
    {
        $this->merge([
            "user_id" => auth()->user()->id,
            "status" => false,
        ]);
    }
}
