<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreContent extends FormRequest
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
					'title' 				=> 'required|string|max:255',
					'sources_id' 			=> 'required|integer',
					'categories_id'			=> 'required|integer',
					'id_content' 			=> 'required|string|max:255|unique:contents',
				];
				
			}
			case 'PUT':
			case 'PATCH':
			{
				return [
					'title' 				=> 'required|string|max:255',
					'sources_id' 			=> 'required|integer',
					'categories_id'			=> 'required|integer',
					'id_content' 			=> 'required|string|max:255|unique:contents,id,'. $this->id,
				];
				
			}
			default:break;
		}
    }
}
