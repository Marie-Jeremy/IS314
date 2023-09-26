<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Rating;

class SubmitRecipeController extends Controller
{
    private function getAllRecipes()
    {
        return Recipe::all();
    }

    public function submitRecipeForm()
    {
        return view('submit-recipe');
    }

    public function submitRecipe(Request $request)
    {
        if (auth()->check()){
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'short-des' => 'required',
            'content' => 'required',
            'fileUpload' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ingredients.*' => 'required',
            'steps.*' => 'required',
            'video-recipe' => 'required|in:yes,no',
            'embed-code' => 'nullable|string',
            'yield' => 'nullable|string',
            'servings' => 'nullable|string',
            'prep-time' => 'nullable|string',
            'cook-time' => 'nullable|string',
            'ready-in' => 'nullable|string',
            'tags' => 'nullable|string',
            'recipe-type' => 'nullable|string',
            'cuisine' => 'nullable|string',
            'course' => 'nullable|string',
            'skill' => 'nullable|string',
        ]);

        $recipe = new Recipe();
        $recipe->user_id = auth()->user()->id;
        $recipe->title = $request->input('title');
        $recipe->short_description = $request->input('short-des');
        $recipe->content = $request->input('content');
    
        // Handling image upload
        if ($request->hasFile('fileUpload')) {
            $imagePath = $request->file('fileUpload')->store('recipe_images', 'public');
            $recipe->image = $imagePath;
        }

       // Handling ingredients array
        $ingredientsArray = $request->input('ingredients');
        $recipe->ingredients = json_encode($ingredientsArray);

        // Handling steps array
        $stepsArray = $request->input('steps'); // Get all steps
        $steps = [];
        foreach ($stepsArray as $stepText) {
            // Skip empty steps
            if (!empty($stepText)) {
                $steps[] = $stepText; // Append each step to the array
            }
        }
        $recipe->steps = json_encode($steps);
        $recipe->yield = $request->input('yield');
        $recipe->servings = $request->input('servings');
        $recipe->prep_time = $request->input('prep-time');
        $recipe->cook_time = $request->input('cook-time');
        $recipe->ready_in = $request->input('ready-in');
        $recipe->tags = $request->input('tags');
        $recipe->recipe_type = $request->input('recipe-type');
        $recipe->cuisine = $request->input('cuisine');
        $recipe->course = $request->input('course');
        $recipe->skill = $request->input('skill');

        $recipe->save();

        $recipes = $this->getAllRecipes(); // Retrieve all recipes from the database
        
        return redirect()->route('my-recipes')->with('success', 'Recipe submitted successfully.');
    }
        //return redirect('/user_home')->with('success', 'Recipe submitted successfully.');
        else {
            // Handle the case where the user is not authenticated
            return redirect()->route('login')->with('error', 'Please log in to submit a recipe.');
        }
    }

    public function myRecipes()
{
    $user = auth()->user();

    if ($user) {
        $recipes = Recipe::where('user_id', $user->id)->get();
        foreach ($recipes as $recipe) {
            $recipe->steps = json_decode($recipe->steps, true);
        }
        $successMessage = session('success');
        return view('my-recipe', ['recipes' => $recipes, 'successMessage' => $successMessage]);
    } else {
        // Handle the case where the user is not authenticated
        return redirect()->route('login')->with('error', 'Please log in to view your recipes.');
    }
}

public function userHome()
{
    $recipes = Recipe::with('ratings')->orderBy('created_at', 'desc')->get();

    return view('user_home', ['recipes' => $recipes]);
}

    public function editRecipe($id)
{
    $recipe = Recipe::findOrFail($id);
    // Additional checks to ensure the user owns the recipe can be added here
    return view('edit-recipe', ['recipe' => $recipe]);
}

public function rate(Request $request, Recipe $recipe)
{
    $user = auth()->user();

    // Check if the user has already rated the recipe
    if ($user->ratings()->where('recipe_id', $recipe->id)->exists()) {
        return redirect()->back()->with('error', 'You have already rated this recipe.');
    }

    // Validate the rating input
    $validatedData = $request->validate([
        'rating' => 'required|numeric|min:1|max:5',
    ]);

    // Create a new rating
    $rating = new Rating([
        'user_id' => $user->id,
        'recipe_id' => $recipe->id,
        'rating' => $validatedData['rating'],
    ]);
    $rating->save();

    return redirect()->back()->with('success', 'Thank you for rating the recipe.');
}

public function showRecipeDetails($id)
{
    $recipe = Recipe::findOrFail($id);
    $recipe->steps = json_decode($recipe->steps, true); // Convert steps to array
    return view('recipe-details', ['recipe' => $recipe]);
}



}
