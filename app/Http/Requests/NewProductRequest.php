<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class NewProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return $this->user()->hasPermissionTo('manage products');
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'category'=>['required','numeric',Rule::exists('categories','id')->where(function($query){
                return $query->whereNotNull('parent_id');
            })],
            'name'=>['required','max:250'],
            'price'=>['required','numeric','min:0'],
            'amount'=>['required','numeric','min:0'],
            'img'=>['required','image']
        ];
    }
}
