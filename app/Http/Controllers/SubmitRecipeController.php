<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Str;
use App\Models\Recipe;
use App\Models\User;
use App\Models\Rating;
use PDF;

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
            'content' => 'nullable',
            'fileUpload' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'ingredients.*' => 'required',
            'steps.*' => 'required',
            'video-recipe' => 'required|in:yes,no',
            'embed-code' => 'nullable|string',
            'yield' => 'nullable|string',
            'servings' => 'nullable|string',
            'prep-time' => 'nullable|string',
            'cook-time' => 'nullable|string',
            'ready-in' => 'nullable|string',
            'tags' => 'required|string',
            'recipe-type' => 'required|string',
            'cuisine' => 'required|string',
            'course' => 'required|string',
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

        // Handle video_recipe and video_embed_code
$recipe->video_recipe = $request->input('video-recipe');
if ($request->input('video-recipe') === 'yes') {
    // If video_recipe is 'yes', set video_embed_code
    $recipe->video_embed_code = $request->input('embed-code');
} else {
    // If video_recipe is 'no', make sure video_embed_code is null
    $recipe->video_embed_code = null;
}

// Handling video upload
if ($request->hasFile('video-upload')) {
    $videoPath = $request->file('video-upload')->store('recipe_videos', 'public');
    $recipe->video_path = $videoPath;
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
    // Convert the JSON-encoded ingredients and steps to arrays
    $recipe->ingredients = json_decode($recipe->ingredients, true);
    $recipe->steps = json_decode($recipe->steps, true);
    return view('edit-recipe', ['recipe' => $recipe]);
}

public function updateRecipe(Request $request, $id)
{
    // Validate the request data here

    $recipe = Recipe::findOrFail($id);

    // Update other fields
    $recipe->title = $request->input('title');
    $recipe->short_description = $request->input('short-des');
    $recipe->content = $request->input('content');
    // ... update other fields ...

    // Update ingredients (assuming ingredients are stored as JSON)
    $ingredients = $request->input('ingredients');
    $recipe->ingredients = json_encode($ingredients);

    // Update steps (assuming steps are stored as JSON)
    $steps = $request->input('steps');
    $recipe->steps = json_encode($steps);

    // Handle video_recipe and video_embed_code
    $recipe->video_recipe = $request->input('video-recipe');
    if ($request->input('video-recipe') === 'yes') {
        // If video_recipe is 'yes', set video_embed_code
        $recipe->video_embed_code = $request->input('embed-code');

        // Delete the video if it exists (optional: you can also move it to a backup folder)
        if (!empty($recipe->video_path)) {
            Storage::delete('public/' . $recipe->video_path);
            $recipe->video_path = null;
        }
    } else {
        // If video_recipe is 'no', make sure video_embed_code is null
        $recipe->video_embed_code = null;

        // Delete the video embedded code if it exists
        if (!empty($recipe->video_embed_code)) {
            // Implement logic to delete or unset the video_embed_code here
            $recipe->video_embed_code = null;
        }

        // Delete the video if it exists (optional: you can also move it to a backup folder)
        if (!empty($recipe->video_path)) {
            Storage::delete('public/' . $recipe->video_path);
            $recipe->video_path = null;
        }
    }

    // Update other fields
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

    // Save the updated recipe
    $recipe->save();

    // Redirect or show a success message
    return redirect()->route('my-recipes')->with('success', 'Recipe updated successfully.');
}


public function delete($id)
{
    $recipe = Recipe::findOrFail($id);

    // Check if the authenticated user is the owner of the recipe
    if (auth()->user()->id === $recipe->user_id) {
        // Delete the recipe
        $recipe->delete();

        // Optionally, you can add a success message or redirect to a specific page
        return redirect()->route('my-recipes')->with('success', 'Recipe deleted successfully.');
    }

    // If the user is not the owner of the recipe, handle the error here
    return redirect()->back()->with('error', 'You do not have permission to delete this recipe.');
}


public function showRecipeDetails($id)
{
    $recipe = Recipe::findOrFail($id);
    $recipe->steps = json_decode($recipe->steps, true); // Convert steps to array
    return view('recipe-details', ['recipe' => $recipe]);
}

public function generatePDF($id)
{
    $recipe = Recipe::find($id);

    if (!$recipe) {
        abort(404);
    }

    // Generate the HTML content for the PDF using a Blade view
    $pdf = PDF::loadView('pdf', ['recipe' => $recipe]);

    // Generate a unique filename for the PDF
    $filename = Str::slug($recipe->title) . '.pdf';

    // Return a response with a link to download the PDF
    return $pdf->download($filename);
}

public function deleteImage(Request $request, $id)
{
    $recipe = Recipe::findOrFail($id);

    // Check if the authenticated user is the owner of the recipe
    if (auth()->user()->id === $recipe->user_id) {
        // Delete the image file
        if (Storage::disk('public')->exists($recipe->image)) {
            Storage::disk('public')->delete($recipe->image);
        }

        // Clear the image attribute in the database
        $recipe->image = null;
        $recipe->save();

        // Optionally, you can add a success message or redirect to a specific page
        return redirect()->route('edit-recipe', ['id' => $id])->with('success', 'Image deleted successfully.');
    }

    // If the user is not the owner of the recipe, handle the error here
    return redirect()->back()->with('error', 'You do not have permission to delete this image.');
}

}
