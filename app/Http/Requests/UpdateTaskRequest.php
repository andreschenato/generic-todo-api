<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    public function authorize(): bool
    {
        $user = $this->user();
        return $user != null && $user->tokenCan("update");
    }

    public function rules(): array
    {
        $method = $this->method();

        if($method == "PUT") {
            return [
                "description"=>["required"],
                "status" => ["required", "boolean"],
            ];
        } else {
            return [
                "description" => ["sometimes", "required"],
                "status" => ["sometimes", "required", "boolean"],
            ];
        }
    }
}
