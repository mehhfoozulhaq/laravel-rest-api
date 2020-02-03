<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class FilmRequest extends FormRequest
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
            'name' => 'required|unique:films|max:50',
            // 'slug' => 'required',
            'description' => 'required',
            'release_date' => 'required|date_format:Y-m-d',
            'rating' => 'required|integer|max:5|min:1',
            'ticket_price' => 'required',
            'country' => 'required',
            'image' => 'required'
        ];
    }
}
