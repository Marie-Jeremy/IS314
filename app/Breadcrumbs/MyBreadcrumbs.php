<?php

// app/Breadcrumbs/MyBreadcrumbs.php

use DaveJamesMiller\Breadcrumbs\Facades\Breadcrumbs;
use DaveJamesMiller\Breadcrumbs\Generator;
use DaveJamesMiller\Breadcrumbs\Trail;

// Define your breadcrumbs here
Breadcrumbs::for('home', function ($trail) {
    $trail->push('Home', route('home'));
});

Breadcrumbs::for('user_home', function ($trail) {
    $trail->push('User Home', route('user_home'));
});

Breadcrumbs::for('recipe_details', function ($trail, $recipe) {
    $trail->parent('user_home');
    $trail->push($recipe->title, route('recipe.details', ['id' => $recipe->id]));});

Breadcrumbs::for('submit_recipe', function ($trail) {
    $trail->parent('user_home'); // Set "User Home" as the parent
    $trail->push('Submit Recipe', route('recipe.submit'));
});
