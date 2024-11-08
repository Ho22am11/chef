<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Exceptions\HttpResponseException;
class ChefPaymentRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

   
    public function rules(): array
    {
        return [
            'chef_id' => 'required|exists:chefs,id', 
            'currency' => 'required|string|size:3', 
            'bank_name' => 'required|string|max:30', 
            'account_type' => 'required|string|max:20', 
            'account_number' => 'required|string|max:20', 
            'SWIFT' => 'nullable|string|size:11',
            'account_branch' => 'nullable|string|max:20', 
            'IBAN' => 'nullable|string|max:34', 
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        $errors = $validator->errors();

        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Validation errors occurred',
            'errors' => $errors
        ], 400));
    }




}
