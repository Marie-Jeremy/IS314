<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;

class SearchController extends Controller
{
    // SearchController.php
    public function search(Request $request)
    {
        $category = $request->input('category');
       
        // Fetch recipes based on the selected category (e.g., breakfast)
        $results = Recipe::where('recipe_type', $category)->paginate(5);
       
        return view('search', ['results' => $results, 'category' => $category]);
    }    
    

}
