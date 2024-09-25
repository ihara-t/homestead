<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Comment;

class CommentController extends Controller
{
    public function store(Request $request,$id){
        $request->validate([
            'body' => 'required'
        ]);


        $comment = new comment();
        $comment->body = $request->body;
        $comment->post_id = $id;
        $comment->save();

        return redirect()
            ->route('text.posts',$id);
    }

    public function destroy(Comment $comment){
        $comment->delete();

        return redirect()
        ->route('text.posts', $comment->post);
    }
}
