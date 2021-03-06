<?php

namespace App\Http\Requests;
use Illuminate\Http\Request;
use Illuminate\Foundation\Http\FormRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if($this->id == Auth::user()->id){
            return true;
        }
        else{
            return false;}
    }
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
                return [
                    'role' => 'required',
                    'name'  => 'required|unique:users,name,' .$this->id,
                    'email'      => 'required|email|unique:users,email,' .$this->id,
                    'password'   => 'required|min:6'];
    }
}
