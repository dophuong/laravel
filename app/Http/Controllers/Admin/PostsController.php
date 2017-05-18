<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests\UserRequest;
use App\Models\Post;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\UploadedFile;
use App\Http\Controllers\Controller;

class PostsController extends Controller
{
    public function show(){
        $post = Post::with('user')->orderBy('created_at','desc')->simplePaginate(2);
        return view('admin.post.post', compact('post'));
    }
    public function addPost(){
        return view('admin.post.addPost');
    }

    /**
     * Get a validator for an incoming add post request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'title' => 'required|unique:posts|string|max:255',
            'content' => 'required|string|max:255',
            'image' => 'required|string|max:255',
            'isPrivate'=>'required'
        ]);
    }

    
    /**
     * Create a new user instance after a valid add.
     *
     * @param  $userId
     * @return Post
     */
    protected function create(Request $request)
    {
        if($request->file('image')){
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('/images'), $imageName);
            $post = new Post;
            $post->image = $imageName;
            $post->userId = Auth::user()->id;
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->isPrivate = $request->get('isPrivate');
            $post->save();
            return back()
                ->with('success','Image Uploaded successfully.')
                ->with('path',$imageName);
        }else{

            return 'Upload image fail!';
        }
    }
}
