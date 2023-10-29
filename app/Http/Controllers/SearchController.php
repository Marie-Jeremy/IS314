<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Recipe;
use League\CommonMark\Node\Query;

class SearchController extends Controller
{
    // SearchController.php
    public function search()
    {
        //$category = $request->input('category');
        $search_text = $_GET['query'];
        // Fetch recipes based on the selected category (e.g., breakfast)
        $recipes = Recipe::where('title', 'LIKE', '%'.$search_text.'%')->get();
        //$results = Recipe::where('recipe_type', $category)->paginate(5);
       
        return view('search', compact('recipes'));
    }    
    
    public function searchTitle()
    {
        //$category = $request->input('category');
        $search_text = $_GET['query'];
        // Fetch recipes based on the selected category (e.g., breakfast)
        $recipes = Recipe::where('title', 'LIKE', '%'.$search_text.'%')->get();
        //$results = Recipe::where('recipe_type', $category)->paginate(5);
       
        return view('searchTitle', compact('recipes'));
    }   
}
