<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddNewsRequest extends FormRequest
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
    'max:30',
    'regex:/^[A-Za-z ]+$/', // only uppercase/lowercase letters and spaces
],
            // 'link'                   => 'required|min:3|max:200',
            'image'                   => 'required|file|mimes:jpg,jpeg,gif,png|max:4096', 
            'pdf'                   => 'required|file|mimes:pdf|max:4096', 
            'status'                        => 'required',

        ];
    }
}
