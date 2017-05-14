<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\User;

class UserRequest extends FormRequest
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
                    'name' => 'required|unique:users',
                    'role'  => 'required',
                    'email'      => 'required|email|unique:users,email',
                    'password'   => 'required|confirmed|min:6',
                ];
            }
            case 'PUT':
            case 'PATCH':
            {
                return [
                    'role' => 'required',
                    'name'  => 'required|unique:users,name,' .$this->id,
                    'email'      => 'required|email|unique:users,email,' .$this->id,
                    'password'   => 'required|min:6',
                ];
            }
            default:break;
        }
    }
}
