<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

/**
 * Class StoreTemplateHeroSectionImageRequest
 * @package App\Http\Requests
 */
class StoreTemplateHeroSectionImageRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check() && auth()->user()->hasRole('admin')) {

            return true;
        }

        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'image' => 'required|mimes:jpeg,jpg,png|max:400',
            'template_name' => 'required',
            'storing_path' => 'required',
            'image_name' => 'required',
            'imageable_type' => 'required',
            'imageable_id' => 'required',
        ];
    }
}
