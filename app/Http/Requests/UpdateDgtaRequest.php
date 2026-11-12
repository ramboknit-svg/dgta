<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateDgtaRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return auth()->user()->type == 1;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
             'long_description' => [
    'required',
    'min:3',
     'regex:/^[A-Za-z0-9 .\s]+$/',
     
],
            
            'left_image'       => 'sometimes|file|mimes:jpg,jpeg,gif,png|max:2048',
            'right_image'       => 'sometimes|file|mimes:jpg,jpeg,gif,png|max:2048',
            
        ];
    }
}

