<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MessagesRequest extends FormRequest
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
            'name'          => 'required|string|max:255',
            'phone'         => 'required|string|max:20',
            'email'         => 'required|email',
            'message'       => 'required|string|max:1000',
        ];
    }

    public function messages()
    {
        return 
        [
            'name.required' => 'الاسم مطلوب',
            'name.max' => 'الاسم يجب أن لا يتجاوز 255 حرفًا',            
            'name.string' => 'الاسم يجب أن يكون نصًا',
            'phone.required' => 'رقم الهاتف مطلوب',
            'phone.max' => 'رقم الهاتف يجب أن لا يتجاوز 20 حرفًا',
            'phone.string' => 'رقم الهاتف يجب أن يكون نصًا',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صالح',            
            'message.required' => 'الرسالة مطلوبة',
            'message.string' => 'الرسالة يجب أن تكون نصًا',
            'message.max' => 'الرسالة يجب أن لا تتجاوز 1000 حرفًا',
        ];
    }

}
