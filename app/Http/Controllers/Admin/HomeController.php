<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(){
        $post = Post::with('user')->orderBy('created_at', 'desc')->simplePaginate(2);
        return view('admin.home', compact('post'));
    }
    public function about(){
        return view('admin.about');
    }
    public function contact(){
        return view('admin.contact');
    }
}
