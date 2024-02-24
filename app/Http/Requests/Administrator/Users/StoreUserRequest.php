<?php

namespace App\Http\Requests\Administrator\Users;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Validation\ValidationException;

class StoreUserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'email' => 'required|unique:users',
            'name' => 'required',
            'role_id' => 'required|integer|in:1,2',
            'birthday' => 'nullable|date_format:Y-m-d|before:today',
            'avatar' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:100000',
            'phone' => 'nullable|numeric|digits:10',
            'province_code' => 'nullable|numeric|digits:2',
            'district_code' => 'nullable|numeric|digits:3',
            'ward_code' => 'nullable|numeric|digits:5',
            'street' => 'nullable|string',
            'address' => 'nullable|string',
            'note' => 'nullable',
        ];
    }

    public function attributes()
    {
        return [
            'email' => 'địa chỉ email',
            'name' => 'họ tên',
            'role_id' => 'vai trò',
            'birthday' => 'ngày sinh',
            'avatar' => 'ảnh đại diện',
            'phone' => 'số điện thoại',
            'province_code' => 'tỉnh thành',
            'district_code' => 'quận huyện',
            'ward_code' => 'phường xã',
            'street' => 'Đường',
            'address' => 'địa chỉ',
            'note' => 'ghi chú',
        ];
    }
}
