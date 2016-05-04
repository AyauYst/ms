<?php namespace App\Http\Requests;

class RoleRequest extends Request {

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'admin' => 'required|alpha|max:50',
            'teacher' => 'required|alpha|max:50',
            'student'  => 'required|alpha|max:50'
        ];
    }

}