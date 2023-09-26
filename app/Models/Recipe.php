<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';

    protected $fillable = [
        'title', 'short_description', 'content', 'user_id', 'image', 'ingredients', 'steps', 
        'video_recipe', 'video_embed_code', 'yield', 'servings', 'prep_time', 'cook_time', 
        'ready_in', 'tags', 'recipe_type', 'cuisine', 'course', 'skill', 
    ];
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function ratings()
{
    return $this->hasMany(Rating::class);
}
}
