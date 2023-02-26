<?php

namespace App\Http\Requests;

use App\Http\Traits\Api\ApiResponseTrait;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class ShowRequest extends FormRequest
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
            'title' => 'required|max:255',
            'date' => 'required|date_format:Y-m-d H:i:s',
            'artist_id' => 'required|exists:artists,id',
            'venue_id' => 'required|exists:venues,id',
        ];
    }

    protected function failedValidation(\Illuminate\Contracts\Validation\Validator $validator)
    {
        $response = $this->apiResponse($validator->errors(),'validation error',Response::HTTP_BAD_REQUEST);
        throw new \Illuminate\Validation\ValidationException($validator, $response);
    }
}
