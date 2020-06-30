<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TourRequest extends FormRequest
{
   /**
    * Determine if the user is authorized to make this request.
    *
    * @return bool
    */
   public function authorize()
   {
       return true;
   }

   /**
    * Get the validation rules that apply to the request.
    *
    * @return array
    */
   public function rules()
   {
       return [
           'name' => 'string',
           'image' => 'mimes:jpeg,bmp,png,ipg',
           'typetour' => 'string',
           'schedule' => 'string',
           'depart' => 'required|date|date_format:Y-m-d',
           'number' => 'numeric',
           'price' => 'numeric',
       ];
   }
   public function messages()
   {
       return [
           'name.string' => 'name không được để trống',
           'image.mimes' => 'Đây không phải hình ảnh',
           'typetour.string' => 'typetour không được để trống',
           'schedule.string' => 'schedule không được để trống',
           'depart.required' => 'depart không được để trống',
           'number.numeric' => 'number không được để trống',
           'price.numeric' => 'price không được để trống',
       ];
   }
}
