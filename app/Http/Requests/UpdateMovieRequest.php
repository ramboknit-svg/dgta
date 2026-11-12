<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateMovieRequest extends FormRequest
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
           
            'name' => 'required|min:3|max:30|regex:/^[^@#$%&()]+$/',
            'image'       => 'sometimes|file|mimes:jpg,jpeg,gif,png,webp|max:4096',
           
        ];
    }
}

