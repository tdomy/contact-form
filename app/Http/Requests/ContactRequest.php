<?php

namespace App\Http\Requests;

use App\Rules\ReCaptcha;
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
     * @param ReCaptcha $recaptcha
     * @return array
     */
    public function rules(ReCaptcha $recaptcha)
    {
        return [
            'name'      => ['required', 'max:20'],
            'email'     => ['required', 'email:rfc'],
            'message'   => ['required', 'max:1024'],
            'token'     => ['required', $recaptcha],
        ];
    }
}
