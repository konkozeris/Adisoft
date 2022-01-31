<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Carbon\Carbon;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCommentRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'comment_email' => 'required|email',
            'comment_content' => 'required|min:5',
        ]);

        $comment = new Comment;
        $input_date = Carbon::now()->format("Y-m-d");

        $comment->content = $request->comment_content;
        $comment->email = $request->comment_email;
        $comment->date = $input_date;
        $comment->article_id = $request->article_id;

        $comment->save();

        return back()->with('message','Comment added !');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Comment  $comment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Comment $comment)
    {
        $comment -> delete();

        return back()->with('message','Comment deleted !');

    }
}
