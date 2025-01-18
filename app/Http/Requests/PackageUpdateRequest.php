<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rules\File;

use Illuminate\Foundation\Http\FormRequest;

class PackageUpdateRequest extends FormRequest
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
            'name'=>'required',
            'price'=>'required',
            'image' =>'required',File::image(),
            'itinerary'=>'required',
            'duration'=>'required',
            'inclusion'=>'required',
            'exclusion'=>'required',
            'destination_id'=>'required',

        ];
    }
}
