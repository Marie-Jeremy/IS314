<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;
use App\Models\Recipe;

class CommentController extends Controller
{
    public function create(Request $request)
{
    // Retrieve the recipe based on the 'recipe' query parameter
    $recipeId = $request->query('recipe');
    $recipe = Recipe::findOrFail($recipeId);

    // Pass the $recipe variable to the view
    return view('comments.create', compact('recipe'));
}



    public function store(Request $request)
    {
       
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'comment' => 'required|string|max:1000',
            'recipe_id' => 'required|exists:recipes,id',
        ]);

        // Get the logged-in user's ID (if the user is authenticated)
        $user_id = auth()->user() ? auth()->user()->id : null;

         // Retrieve the associated recipe based on the recipe_id from the form
    $recipe = Recipe::findOrFail($request->input('recipe_id'));

        // Create a new comment
        $comment = new Comment([
            'name' => $request->input('name'),
            'email' => $request->input('email'),
            'comment' => $request->input('comment'),
            'recipe_id' => $recipe->id,
            'user_id' => $user_id, // Associate the comment with the logged-in user
        ]);

        // Associate the comment with the specified recipe
        $recipe->comments()->save($comment);

        return redirect()->back()->with('success', 'Comment posted successfully.');
    }
}
