<?php

use Illuminate\Support\Facades\Route;
use App\Models\Customers;
use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use DaveJamesMiller\Breadcrumbs\Generator;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/breakfast', [App\Http\Controllers\SubmitRecipeController::class, 'showBreakfastRecipes'])->name('breakfast');
Route::get('/lunch', [App\Http\Controllers\SubmitRecipeController::class, 'showlunchRecipes'])->name('lunch');
Route::get('/dinner', [App\Http\Controllers\SubmitRecipeController::class, 'showdinnerRecipes'])->name('dinner');
Route::get('/dessert', [App\Http\Controllers\SubmitRecipeController::class, 'showdessertRecipes'])->name('dessert');


Auth::routes();

Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Route::get('/home', function () {
    return view('home');
})->name('home');


Route::get('/register', [App\Http\Controllers\UserController::class, 'create']);
Route::post('/register', [App\Http\Controllers\UserController::class, 'store'])->name('register.store');

// Route to show the recipe submission form
Route::get('/submit-recipe', [App\Http\Controllers\SubmitRecipeController::class, 'submitRecipeForm']);

// Route to handle recipe submission
Route::post('/submit-recipe', [App\Http\Controllers\SubmitRecipeController::class, 'submitRecipe']);

// Route to show user's recipes
Route::get('/my-recipe', [App\Http\Controllers\SubmitRecipeController::class, 'myRecipes'])->name('my-recipes');

// Define breadcrumbs for the "user_home" route
Breadcrumbs::for('user_home', function ($trail) {
    $trail->push('Home', route('user-home'));
});
Route::get('/user_home', [App\Http\Controllers\SubmitRecipeController::class, 'userHome'])->name('user-home');

Route::get('/edit-recipe/{id}', [App\Http\Controllers\SubmitRecipeController::class, 'editRecipe'])->name('edit-recipe');

Route::put('/update-recipe/{id}', [App\Http\Controllers\SubmitRecipeController::class, 'updateRecipe'])->name('update-recipe');

Route::post('/recipes/{recipe}/rate', [App\Http\Controllers\SubmitRecipeController::class, 'rate'])->name('recipes.rate');

Breadcrumbs::for('recipe_details', function ($trail, $recipe) {
    $trail->parent('user_home');
    $trail->push($recipe->title, route('recipe.details', ['id' => $recipe->id]));
});
Route::get('/recipes/{id}', [App\Http\Controllers\SubmitRecipeController::class, 'showRecipeDetails'])->name('recipe.details');

Route::delete('/recipes/{id}', [App\Http\Controllers\SubmitRecipeController::class, 'delete'])->name('delete-recipe');

Route::get('/generate-pdf/{id}', [App\Http\Controllers\SubmitRecipeController::class, 'generatePDF'])->name('generate-pdf');
Route::get('/recipes/{recipe}/pdf', [App\Http\Controllers\SubmitRecipeController::class, 'generatePDF'])->name('recipe.pdf');

Route::delete('/delete-image/{id}', [App\Http\Controllers\SubmitRecipeController::class, 'deleteImage'])->name('delete-image');

Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::post('/replies', [App\Http\Controllers\ReplyController::class,'store'])->name('replies.store');

Route::get('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('recipes.search.get');
Route::post('/search', [App\Http\Controllers\SearchController::class, 'search'])->name('recipes.search.post');
Route::get('/searchTitle', [App\Http\Controllers\SearchController::class, 'searchTitle']);