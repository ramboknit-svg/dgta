<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class AddKnowledgeRequest extends FormRequest
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

            'link'                   => 'required|min:3|max:30',
            'image'                   => 'required|file|mimes:jpg,jpeg,gif,png|max:4096', 
            'status'                        => 'required',

        ];
    }
}
