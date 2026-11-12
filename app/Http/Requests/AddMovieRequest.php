<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddMovieRequest extends FormRequest
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

            
            'image'                   => 'required|file|mimes:jpg,jpeg,gif,png|max:4096', // Adjust max size as needed
            'status'                        => 'required',

        ];
    }
}
