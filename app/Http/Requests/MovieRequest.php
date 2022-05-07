<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Elegant\Sanitizer\Laravel\SanitizesInput;

class MovieRequest extends Request
{
    use SanitizesInput;

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
            'title' => 'required|regex:([a-zA-Z\-. ]+)|max:255',
            'image' => 'required_without:old_image|nullable|file|image|mimes: jpeg,jpg,png,gif,svg|max:2048',
            'release' => 'required',
            'rating' => 'required'
        ];
    }

    /**
     * Get the filters that apply to the request.
     * 
     * @return array
     */
    public function filters()
    {
        return [
            'name' => 'trim|strip_tags|capitalize',
            'image' => 'trim|strip_tags',
            'release' => 'trim|strip_tags',
            'rating' => 'trim|strip_tags',
        ];
    }
}