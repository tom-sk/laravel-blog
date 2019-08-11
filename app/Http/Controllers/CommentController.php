<?php

namespace App\Http\Controllers;

use App\Comment;
use App\Blog;
use Illuminate\Http\Request;

class CommentController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, Blog $blog)
    {
        $user = auth()->user();

        $comment = new Comment;
        $comment->content = $request->comment;
        $comment->user_id = $user->id;
//        $comment->blog_id = $blog->id;
        $comment->commentable_id = $blog->id;
        $comment->commentable_type = 'App\Blog';
        $comment->save();

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        //
    }

    public function reply(Request $request, Comment $comment)
    {
        $user = auth()->user();

        $reply = new Comment;
        $reply->content = $request->comment;
        $reply->user_id = $user->id;
        $reply->commentable_id = $comment->id;
        $reply->commentable_type = 'App\Comment';
        $reply->save();

        return redirect()->back();
    }
}
