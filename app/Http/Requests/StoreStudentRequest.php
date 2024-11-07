<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreStudentRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->expectsJson();
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    

     public function rules()
     {
         return [
            'first_name' => 'required|string|max:255',
            'last_name' => 'required|string|max:255',
            'birthday' => 'required|date',
            'sex' => 'nullable|in:male,female,others',
             
            'house_no' => 'nullable|string|max:20',
            'street' => 'nullable|string|max:255',
            'barangay' => 'nullable|string|max:255',
            'city' => 'required|string|max:255',
            'province' => 'required|string|max:255',
            'zip' => 'required|string|max:10',
             
            'phone_number' => 'required|string|size:11',
            'secondary_phone' => 'nullable|string|size:11',
            'other_phone' => 'nullable|string|size:11',
            'email' => 'required|email|unique:patrons,email',
            'secondary_email' => 'nullable|email',
            'primary_contact' => 'nullable|in:phone,email,secondary_email,secondary_phone,other_phone',
             
            'card_number' => 'required|string|size:9|unique:patrons,card_number',
            'college' => 'nullable|string|max:255',
            'course' => 'nullable|string|max:255',
             
            'registration_date' => 'required|date',
            'expiry_date' => 'required|date|after:registration_date',
         ];
     }
 
     public function messages()
     {
         return [
             'first_name.required' => 'The first name field is required.',
             'last_name.required' => 'The last name field is required.',
             'birthday.required' => 'The birthday field is required.',
             'birthday.date' => 'The birthday must be a valid date.',
             'sex.in' => 'The sex field must be either male, female, or others.',
        
             'city.required' => 'The city field is required.',
             'province.required' => 'The province field is required.',
             'zip.required' => 'The zip code field is required.',
             
             'phone_number.required' => 'The primary phone number is required.',
             'phone_number.size' => 'The phone number must be exactly 11 digits.',
             'email.required' => 'An email address is required.',
             'email.email' => 'The email must be a valid email address.',
             'email.unique' => 'The email has already been taken.',
             'card_number.required' => 'The cardnumber is required.',
             'card_number.unique' => 'A patron with this cardnumber already exists.',
             'card_number.size' => 'A cardnumber must have 9 digits only.',
             
             'registration_date.required' => 'The registration date is required.',
             'expiry_date.required' => 'The expiry date is required.',
             'expiry_date.after' => 'The expiry date must be after the registration date.',
         ];
     }
}
