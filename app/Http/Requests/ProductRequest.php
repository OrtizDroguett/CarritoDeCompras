<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;//estaba false, la cambie a true
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'title'=>['required','max:255'],
            'description'=>['required','max:255'],
            'price'=>['required','min:1'],
            'stock'=>['required','min:0'],
            'status'=>['required','in:available,unavailable'],
        ];
    }
    public function withValidator($validator)
    {
        $validator->after(function($validator)
        {
            if($this->status =='available'&&$this->stock==0){
                //    session()->flash('error','Si está disponible, debe tener stock'); esta es una alternativa al witherrors, el witherrors es una forma directa de manejar errores
                    
                    $validator->errors()->add('stock','Si está disponible, debe tener stock');
                }
        });
    }
}
