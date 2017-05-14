<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\User;


class PagesController extends Controller
{
    public function home(){
        $user = User::all();
        return view('home', compact('user'));
    }
    public function about(){
        return view('about');
    }
    public function contact(){
        return view('contact');
    }
}
