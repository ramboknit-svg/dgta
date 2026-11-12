<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateHodRequest extends FormRequest
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
             'name' => [
    'required',
    'min:3',
    'max:100',
    'regex:/^[A-Za-z ]+$/', // only uppercase/lowercase letters and spaces
],
 'designation' => [
    'required',
    'min:3',
    'max:100',
    'regex:/^[A-Za-z ,]+$/', // only uppercase/lowercase letters and spaces
],
  'description' => 'required',
            'image'       => 'sometimes|file|mimes:jpg,jpeg,gif,png|max:4096',
            'status'      => 'required',
        ];
    }
}

