<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTelRequest extends FormRequest
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
        'rank' => [
    'required',
    'min:3',
    'max:50',
    'regex:/^[A-Za-z ]+$/', // only uppercase/lowercase letters and spaces
],
        'name' => [
    'required',
    'min:3',
    'max:50',
    'regex:/^[A-Za-z ]+$/', // only uppercase/lowercase letters and spaces
],
'appointment' => [
    'required',
    'min:3',
    'max:50',
    'regex:/^[A-Za-z ]+$/', // only uppercase/lowercase letters and spaces
],
'br' => [
    'required',
    'min:3',
    'max:50',
    'regex:/^[A-Za-z ,]+$/', // only uppercase/lowercase letters and spaces
],
             'nfs' => 'sometimes',
              'intercom' => 'required|min:3',
               'tos' => 'required|min:3',
               
           
        ];
    }
}

