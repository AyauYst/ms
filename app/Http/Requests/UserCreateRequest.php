<?php namespace App\Http\Requests;

class UserCreateRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name' => 'required|max:255|alpha|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|confirmed|min:6'
        ];
    }

}