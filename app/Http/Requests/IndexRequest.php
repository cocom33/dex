<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexRequest extends FormRequest
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
            'image' => 'required|image',
            'name' => 'required|min:5|max:255',
            'id_wp' => 'required|integer',
            'refine' => 'required',
            'type' => 'required',
            'awaken' => 'required',
            'label' => 'required',
            'skill_1' => 'required|min:5|max:255',
            'skill_1_desc' => 'required|min:5|max:255',
            'skill_2' => 'required|min:5|max:255',
            'skill_2_desc' => 'required|min:5|max:255',
        ];
    }
}