<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Comment;

class CommentController extends Controller
{
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'body' => 'required',
            'recipe_id' => 'required|exists:recipes,id',
        ]);

        $comment = new Comment;
        $comment->body = $validatedData['body'];
        $comment->user_id = auth()->user()->id;
        $comment->recipe_id = $validatedData['recipe_id'];
        $comment->save();

        return redirect()->back();
    }

    public function destroy($id)
    {
        $comment = Comment::find($id);

        if (!$comment) {
            return redirect()->back()->with('error', 'Comment not found');
        }
        $comment->delete();

        return redirect()->back()->with('success', 'Comment deleted successfully');
    }
}
