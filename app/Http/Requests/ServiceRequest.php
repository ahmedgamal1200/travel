<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ServiceRequest extends FormRequest
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
            'first_name'    => 'required|string',
            'last_name'     => 'required|string',
            'email'         => 'required|email',
            'adults_count'  => 'required|integer|min:1'
        ];
    }

    public function messages()
    {
        return 
        [
            'first_name.required' => 'الاسم مطلوب',
            'first_name.string' => 'الاسم يجب أن يكون نصًا',
            'last_name.required' => 'الاسم مطلوب',
            'last_name.string' => 'الاسم يجب أن يكون نصًا',
            'email.required' => 'البريد الإلكتروني مطلوب',
            'email.email' => 'البريد الإلكتروني غير صالح',            
            'adults_count.required' => 'عدد البالغين مطلوب',
            'adults_count.integer' => 'عدد البالغين يجب أن يكون عدد صحيح',
            'adults_count.min' => 'عدد البالغين يجب أن يكون على الأقل 1'
        ];
    }
}
