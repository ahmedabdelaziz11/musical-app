<?php

namespace App\Http\Requests;

use App\Http\Traits\Api\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class ArtistRequest extends FormRequest
{
    use ApiResponseTrait;
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255',
            'about' => 'required',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = $this->apiResponse($validator->errors(),'validation error',Response::HTTP_BAD_REQUEST);
        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
