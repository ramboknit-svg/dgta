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
                'min:2',
                'regex:/^[A-Za-z0-9\s]+$/',
            ],
           
            'image'                   => 'required|file|mimes:jpg,jpeg,gif,png|max:1024', 
            
            'status'                        => 'required',

        ];
    }
}
