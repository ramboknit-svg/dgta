<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdatePlaceRequest extends FormRequest
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
            // 'title'       => 'required|min:3|max:100',
            // 'description' => 'required|min:3|max:500',
            'image'       => 'sometimes|file|mimes:jpg,jpeg,gif,png|max:4096',
             'name' => [
    'required',
    'min:3',
    'max:30',
    'regex:/^[A-Za-z ]+$/', // only uppercase/lowercase letters and spaces
],
           
            'status'      => 'required',
        ];
    }
}

