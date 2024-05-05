<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

class UserRegisterRequest extends FormRequest
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
            "email" => ['required', 'max:255', 'email'],
            "password" => ['required', 'max:255', 'min:8'],
            "name" => ['required', 'max:255'],
            "role" => ['required', 'max:255'],
            "invitation_code" => ['nullable', 'size:6']
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        // if mobile app, use this but if web redirect to register page with errors
        if ($this->is('api/*')) {
            throw new HttpResponseException(response([
                "errors" => $validator->getMessageBag()
            ], 400));
        } else {
            return redirect('/register')->withErrors($validator->getMessageBag())->withInput();
        }
    }
}
