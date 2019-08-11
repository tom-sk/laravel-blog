<?php

namespace App\Http\Controllers;

use App\Blog;
use App\Comment;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Builder;

class BlogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('new-blog');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $user = auth()->user();

        $blog = new Blog;
        $blog->title = $request['title'];
        $blog->content = $request['content'];
        $blog->user_id = $user->id;

        $blog->save();

        return redirect()->to('home');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function show(Blog $blog)
    {
        $comments = '';

        if($blog->comments){
            $comments = $blog->comments;
        }

        if($comments){
            $comments = $comments;

            foreach ($comments as $comment){
                if($comment->comments){
                    $newComment = Comment::find($comment->id);
                    $comment->replies = $newComment->comments;
                }
            }
        }

        return view('single', [
            'blog' => $blog,
            'comments' => $comments
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function edit(Blog $blog)
    {
        //

        return view('edit', [
            'blog' => $blog
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Blog  $blog
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Blog $blog)
    {
        //

        $blog->title = $request->title;
        $blog->content = $request->content;
        $blog->save();

        return redirect()->back();
    }


    public function destroy(Blog $blog)
    {
        $blog->delete();
        return redirect()->back();
    }
}
