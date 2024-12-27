<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;
use Illuminate\Contracts\Validation\Validator;

use Illuminate\Http\Exceptions\HttpResponseException;
class OrderRequest extends FormRequest
{
    
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        return [
            'service_id' => 'required|exists:services,id',
            'cuisine_id' => 'required|exists:cuisines,id',
            'chef_id' => 'nullable',
            'user_id' => 'nullable',
            'package_id' => 'required|exists:packages,id',
            'adult' => 'nullable|integer|min:0',
            'teen' => 'nullable|integer|min:0',
            'children' => 'nullable|integer|min:0',
            'breakfast_status' => 'nullable' ,
            'lunch_status' => 'nullable' ,
            'dinner_status' => 'nullable' ,
            'day' => 'required|date',
            'addition_service' =>'nullable' ,                            
            'from_time' => 'required' ,
            'to_time' => 'required' ,
            'details' => 'nullable|string|max:500',
            'state' => [
                'required',
            ],
            'cost' => 'nullable',
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
