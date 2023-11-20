<?php

namespace App\Http\Requests;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;
use Illuminate\Validation\ValidationException;
use Symfony\Component\HttpFoundation\JsonResponse;

abstract class ApiFormRequest extends FormRequest{

    abstract public function rules();

    abstract public function authorize();

    protected function failedValidation(Validator $validator){
        $erros = (new ValidationException($validator->errors()));

        throw new HttpResponseException(
            response()->json(['erros'=> $erros], JsonResponse::HTTP_UNPROCESSABLE_ENTITY)
        );
    }
}
