<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\User;

class Recipe extends Model
{
    use HasFactory;

    protected $table = 'recipes';

    protected $primaryKey = 'id';

    protected $fillable = [
        'title', 'short_description', 'user_id', 'image', 'ingredients', 'steps', 
        'video_recipe', 'video_embed_code', 'servings', 'prep_time', 'cook_time', 
        'ready_in', 'tags', 'recipe_type', 'cuisine', 'skill', 'video_path',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    
    public function hasVideoUpload()
    {
        // Check if either 'video_embed_code' or 'video_path' is not empty
        return !empty($this->video_embed_code) || !empty($this->video_path);
    }

    public function ratings()
{
    return $this->hasMany(Rating::class);
}

 // Define the one-to-many relationship with Comment
 public function comments()
 {
     return $this->hasMany(Comment::class);
 }
}
