<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreSource extends FormRequest
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
					'name' 					=> 'required|string|max:255|unique:sources',
					'url' 					=> 'required|string|max:255|unique:sources',
					'embed_code' 			=> 'required|string|max:255',
					'example' 			=> 'required|string|max:255',
				];
				
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'name' 					=> 'required|string|max:255|unique:sources,id,'. $this->id,
					'url' 					=> 'required|string|max:255|unique:sources,id,'. $this->id,
					'embed_code' 			=> 'required|string|max:255',
					'example' 			=> 'required|string|max:255',
				];
				
			}
			default:break;
		}
    }
}
