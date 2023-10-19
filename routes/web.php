<?php

use Illuminate\Support\Facades\Route;
use App\Models\Customers;

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

Route::get('/contact', function () {
    return view('dinner');
});

Auth::routes();

//Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/home', function () {
    return view('home');
});

Route::get('/policy', function () {
    return view('breakfast');
});

Route::get('/user_home', [App\Http\Controllers\Admin\CustomersController::class, 'showHomepage'])->name('user_home');

Route::prefix('admin')->middleware(['auth', 'isAdmin'])->group(function () {

    Route::get('/dashboard',[App\Http\Controllers\Admin\DashboardController::class, 'index']);

    Route::get('policy', [App\Http\Controllers\Admin\PolicyController::class, 'index']);
    Route::get('add-policy', [App\Http\Controllers\Admin\PolicyController::class, 'create']);
    Route::post('add-policy', [App\Http\Controllers\Admin\PolicyController::class, 'store']);
    Route::get('edit-policy/{policy_id}', [App\Http\Controllers\Admin\PolicyController::class, 'edit']);
    Route::put('update-policy/{policy_id}', [App\Http\Controllers\Admin\PolicyController::class, 'update']);
    Route::get('delete-policy/{policy_id}', [App\Http\Controllers\Admin\PolicyController::class, 'destroy']);
    Route::get('generate-pdf/', [App\Http\Controllers\Admin\PolicyController::class, 'generatePDF']);

    Route::get('premium', [App\Http\Controllers\Admin\PremiumController::class, 'index']);
    Route::get('premium/{policy_number}', [App\Http\Controllers\Admin\PremiumController::class, 'edit']);
    Route::put('update-premium/{policy_id}', [App\Http\Controllers\Admin\PremiumController::class, 'update']);
   
    Route::get('customers', [App\Http\Controllers\Admin\CustomersController::class, 'index']);
    Route::get('add-customer', [App\Http\Controllers\Admin\CustomersController::class, 'create']);
    Route::post('add-customer', [App\Http\Controllers\Admin\CustomersController::class, 'store']);
    Route::get('edit-customer/{cutomers_id}', [App\Http\Controllers\Admin\CustomersController::class, 'edit']);
    Route::put('update-customer/{customers_id}', [App\Http\Controllers\Admin\CustomersController::class, 'update']);
    Route::get('delete-customer/{customers_id}', [App\Http\Controllers\Admin\CustomersController::class, 'destroy']);
    Route::get('generate-pdf/{customers_id}', [App\Http\Controllers\Admin\CustomersController::class, 'generatePDF']);
    Route::get('premiumindex', [App\Http\Controllers\Get_PremiumController::class, 'premiumindex']);
    Route::get('policy/description/{policy_type}', [App\Http\Controllers\Admin\PolicyController::class, 'getDescription']);
    Route::get('upgrade-requests', [App\Http\Controllers\Admin\CustomersController::class, 'showUpgradeRequests'])->name('admin.upgradeRequests');

    Route::get('claims', [App\Http\Controllers\Admin\ClaimsController::class, 'index'])->name('claims');
    Route::get('add-claims', [App\Http\Controllers\Admin\ClaimsController::class, 'create']);
    Route::post('add-claims', [App\Http\Controllers\Admin\ClaimsController::class, 'store'])->name('claims.store');
    Route::get('edit-claim/{id}', [App\Http\Controllers\Admin\ClaimsController::class, 'edit'])->name('claims.edit');
    Route::put('update-claim/{id}', [App\Http\Controllers\Admin\ClaimsController::class, 'update'])->name('claims.update');
    Route::get('delete-claim/{id}', [App\Http\Controllers\Admin\ClaimsController::class, 'destroy'])->name('claims.destroy');
    Route::put('update-claim/{id}', [App\Http\Controllers\Admin\ClaimsController::class, 'updateStatus'])->name('claims.update');
    Route::get('claims.generate-pdf/{id}', [App\Http\Controllers\Admin\ClaimsController::class, 'generatePDF'])->name('claims.generate-pdf');

    Route::get('payments', [App\Http\Controllers\Admin\CustomersController::class, 'showPaymentsMade'])->name('admin.payments');

});

Route::get('/register', [App\Http\Controllers\UserController::class, 'create']);
Route::post('/register', [App\Http\Controllers\UserController::class, 'store'])->name('register.store');

Route::get('/user_home', [App\Http\Controllers\Admin\CustomersController::class, 'userHome'])->name('user_home');

// Route to show the recipe submission form
Route::get('/submit-recipe', [App\Http\Controllers\SubmitRecipeController::class, 'submitRecipeForm']);
// Route to handle recipe submission
Route::post('/submit-recipe', [App\Http\Controllers\SubmitRecipeController::class, 'submitRecipe']);
// Route to show user's recipes
Route::get('/my-recipe', [App\Http\Controllers\SubmitRecipeController::class, 'myRecipes'])->name('my-recipes');
Route::get('/user_home', [App\Http\Controllers\SubmitRecipeController::class, 'userHome'])->name('user-home');
Route::get('/edit-recipe/{id}', [App\Http\Controllers\SubmitRecipeController::class, 'editRecipe'])->name('edit-recipe');
Route::put('/update-recipe/{id}', [App\Http\Controllers\SubmitRecipeController::class, 'updateRecipe'])->name('update-recipe');
Route::post('/recipes/{recipe}/rate', [App\Http\Controllers\SubmitRecipeController::class, 'rate'])->name('recipes.rate');
Route::get('/recipes/{id}', [App\Http\Controllers\SubmitRecipeController::class, 'showRecipeDetails'])->name('recipe.details');
Route::delete('/recipes/{id}', [App\Http\Controllers\SubmitRecipeController::class, 'delete'])->name('delete-recipe');
Route::get('/generate-pdf/{id}', [App\Http\Controllers\SubmitRecipeController::class, 'generatePDF'])->name('generate-pdf');
Route::delete('/delete-image/{id}', [App\Http\Controllers\SubmitRecipeController::class, 'deleteImage'])->name('delete-image');
Route::post('/comments', [App\Http\Controllers\CommentController::class, 'store'])->name('comments.store');
Route::post('/replies', [App\Http\Controllers\ReplyController::class,'store'])->name('replies.store');
