<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Reply;
use App\Models\User;
use App\Models\Recipe;

class ReplyController extends Controller
{
    public function create(Request $request, $commentId)
{
    // Retrieve the comment based on the $commentId
    $comment = Comment::findOrFail($commentId);

    // Pass the $comment variable to the view
    return view('replies.create', compact('comment'));
}

    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'reply' => 'required|string|max:1000',
            'comment_id' => 'required|exists:comments,id',
        ]);

        // Get the logged-in user's ID (if the user is authenticated)
        $user_id = auth()->user() ? auth()->user()->id : null;

        // Retrieve the associated comment based on the comment_id from the form
        $comment = Comment::findOrFail($request->input('comment_id'));

        // Create a new reply
        $reply = new Reply([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'reply' => $request->input('reply'),
            'comment_id' => $comment->id,
            'user_id' => $user_id, // Associate the reply with the logged-in user
        ]);

        // Save the reply to the database
        $reply->save();

        return redirect()->back()->with('success', 'Reply posted successfully.');
    }
}
