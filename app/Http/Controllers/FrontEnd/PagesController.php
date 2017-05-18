<?php

namespace App\Http\Controllers\FrontEnd;
use App\Http\Requests\PostRequest;
use App\Models\Comment;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use App\Http\Requests\UserRequest;
use Auth;
use App\Models\Post;
use Illuminate\Http\Response;
class PagesController extends Controller
{
    protected $users;

    public function index(){
        $user = User::all();
        if(Auth::check()){
            $post = Post::with('user')
                ->where('isPrivate','=','0')
                ->orWhere('userId','=',Auth::user()->id)
                ->orderBy('created_at', 'desc')->simplePaginate(2);
            return view('front.home', compact('post','user'));
        }
        $post = Post::with('user')
            ->where('isPrivate','=','0')
            ->orderBy('created_at', 'desc')->simplePaginate(2);
        return view('front.home', compact('post','user'));
    }

    public function about(){
        return view('front.about');
    }
    ////////////////////////
    public function contact(){
        return view('front.contact');
    }
    //////////////////////
    public function profile()
    {
        $user = User::findOrFail(Auth::user()->id);
        return view('front.userProfile', compact('user'));
    }
    ////////////////////
    public function getEditProfile()
    {
        $user = User::findOrFail(Auth::user()->id);

        return view('front.userEdit', compact('user'));
    }
    ///////////////////
    public function updateProfile(UserRequest $request,$id)
    {
        $user = User::findOrFail($id);

        $user->name=$request->input('name');
        $user->email=$request->input('email');
        $user->password = bcrypt($request->input('password'));
        $user->role = 2;
        $user->save();
            return redirect()->action('FrontEnd\PagesController@profile')->with('message','Success');
    }

    public function deleteProfile(){
        try{
            $user = User::findOrFail(Auth::user()->id);
            $user->delete();
            return redirect('/')->with('message', 'Delete success !');
        }
        catch (\Exception $e)
        {
            return redirect('/')->with('error', 'Cannot delete. Try again !');
        }
    }

    public function getAddPost(){
        return view('front.userAddPost');
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
//     * @param  $userId
     * @return Post
     */
    protected function addPost(Request $request)
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
            return redirect(route('userPost'))
                ->with('success','Image Uploaded successfully.')
                ->with('path',$imageName);
        }else{

            return 'Upload image fail!';
        }
    }
    public function post(){
        $post = Post::with('user')
            ->where('userId',Auth::user()->id)
            ->orderBy('created_at','desc')
            ->simplePaginate(2);
        return view('front.userPost', compact('post'));
    }
    ///////////list post of user/////////////
    public function listPost($id){
        $user = User::all();
        $post = Post::with('user')
            ->where('userId',$id)
            ->orderBy('created_at','desc')
            ->simplePaginate(2);
        return view('front.userListPost', compact('post','user'));
    }
    //////////////view post
    public function viewPost($id){
        $user = User::all();
        $allPost = Post::all();
        $post = Post::findOrFail($id);
        return view('front.userViewPost', compact('post','allPost','user'));
    }
    
    public function getEditPost($id){
        $post = Post::findOrFail($id);
        return view('front.userEditPost', compact('post'));
    }
    public function editPost(PostRequest $request, $id){
        $post = Post::findOrFail($id);
        if($request->file('image')){
            $this->validate($request, [
                'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            ]);
            $imageName = $request->file('image')->getClientOriginalName();
            $request->image->move(public_path('/images'), $imageName);
            $post->id = $id;
            $post->userId = Auth::user()->id;
            $post->title = $request->input('title');
            $post->content = $request->input('content');
            $post->image = $imageName;
            $post->isPrivate = $request->get('isPrivate');
            $post->save();
            return redirect(route('userPost'))
                ->with('success','Update post successfully.')
                ->with('path',$imageName);
        }else{

            return 'Upload image fail!';
        }
    }
    public function deletePost($id){
        try{
            $post = Post::findOrFail($id);
            $post->delete();
            return redirect(route('userPost'))->with('message', 'Delete success !');
        }
        catch (\Exception $e)
        {
            return redirect(route('userPost'))->with('error', 'Cannot delete. Try again !');
        }
    }
    public function addComment(Request $request, $postId){
        if($request->isMethod('POST')){
            if($request->all()){
                $this->validate($request,[
                    'postId'=>'required',
                    'content'=>'required',
                ]);
                $comment = new Comment();
                $comment->postId = $request->input('postId');
                $comment->parentId = $request->input('parentId');
                $comment->content = $request->input('content');
                $comment->author = Auth::user()->name;
                if($comment->save()){
                    $json = json_encode(array('msg'=>'save successfully'));
                }
                else{
                    $json = json_encode(array('msg'=>'cannot save'));
                }
            }
            else{
                $json = json_encode(array('msg'=>'false, need fill input'));
            }
        }
        else {
            $json = json_encode(array('msg'=>'cannot post'));
        }
     return response()->json($json);
    }
    public function getComment($postId){
        $comment = DB::table('comments')->where('postId',$postId)->orderBy('created_at','ASC')->get();
        return response()->json($comment);
    }
}
