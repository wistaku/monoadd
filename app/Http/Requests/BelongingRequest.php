<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BelongingRequest extends FormRequest
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
            "belonging_name" => "required",
            "address_option" => "required",
            "tag_option" => "required",
        ];
    }

    public function messages()
    {
        return [
            "belonging_name.required" => "モノの名前を入力してください",
            "address_option.required" => "住所を追加してください",
            "tag_option.required" => "タグを追加してください",
        ];
    }
}
