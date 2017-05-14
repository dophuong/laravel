<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Foundation\Auth\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\UserRequest;
use Illuminate\Support\Facades\Redirect;

class UsersController extends Controller
{
    /**
     * The user repository implementation.
     *
     */
    protected $users;
//
//    /**
//     * Create a new controller instance.
//     *
//     * @return void
//     */
//    public function __construct(UserRepository $users)
//    {
//        $this->users = $users;
//    }

    public function profile($id)
    {
        $user = User::findOrFail($id);
        return view('admin.profile', compact('user'));
    }
    public function show(){
        $user = User::all();
        return view('admin.user', compact('user'));
    }
    public function addView(){
        return view('admin.addUser');
    }
    public function create(UserRequest $request){
        $user = new User;
        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role=$request->get('role');
        $user->save();
        return redirect()->action('Admin\UsersController@show');
    }
    public function edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.editUser', compact('user'));
    }
    /**
     * Update the specified user.
     *
     * @param  UserRequest  $request
     * @param  string  $id
     * @return Response
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
            $user->name=$request->input('name');
            $user->email=$request->input('email');
            $user->password = bcrypt($request->input('password'));
            $user->role=$request->get('role');
            $user->save();
            return redirect()->action('Admin\UsersController@profile',['id'=>$id]);

    }
    public function delete($id){
        try{
            $user = User::findOrFail($id);
            $user->delete();
                return redirect()->action('Admin\UsersController@show')->with('message', 'Delete success !');
        }
        catch (\Exception $e)
        {
            return redirect()->route('Admin\UsersController@show')->with('error', 'Cannot delete. Try again !');
        }

    }
}
