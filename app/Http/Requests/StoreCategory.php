<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreCategory extends FormRequest
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
        switch($this->method())
		{
			case 'GET':
			case 'DELETE':
			{
				return [];
			}
			case 'POST':
			{
				return [
					'name' 			=> 'required|string|max:255|unique:categories',
				];
				
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'name' 			=> 'required|string|max:255|unique:categories,id,'. $this->id,
				];
				
			}
			default:break;
		}
    }
}
