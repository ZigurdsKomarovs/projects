<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use Illuminate\Http\Request;


class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'author_name' => 'required',
            'body' => 'required',
            'commentable_id' => 'required',
            'commentable_type' => 'required',
        ]);

        $comment = Comment::create([
            'author_name' => $validateData['author_name'],
            'body' => $validateData['body'],
            'commentable_id' => $validateData['commentable_id'],
            'commentable_type' => $validateData['commentable_type'],
        ]);

        $comment->save();
        
        return redirect()->back();
    }

}
