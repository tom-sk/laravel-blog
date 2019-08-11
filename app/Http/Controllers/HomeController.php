<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Comment;
use App\Blog;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();

        $id = $user->id;

        $posts = User::find(1)->posts;

        return view('home', [
            'posts' => $posts
        ]);
    }

    public function allPosts()
    {
        $allBlogs = Blog::all();

        return view('welcome', [
            'blogs' => $allBlogs
        ]);
    }
}
