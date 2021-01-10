<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class GalleryRequest extends FormRequest
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

            'travel_packages_id' => 'required|integer|exists:travel_packages,id',
            'image' => 'nullable|image|mimes:png,jpg,jpeg,svg|max:2048'
        ];
    }

    public function messages()
    {
        return [
            'image.max' => 'Ukuran file tidak boleh lebih dari 2MB',
            'image.image' => 'File harus berbentuk gambar',
            'image.mimes' => 'File harus berkekstensi png, jpg, jpeg, atau svg'
        ];
    }
}
