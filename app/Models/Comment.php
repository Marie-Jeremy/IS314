<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'email', 'comment', 'recipe_id', 'user_id'];

    // Relationship: A comment belongs to a recipe
    public function recipe()
    {
        return $this->belongsTo(Recipe::class);
    }

    // Relationship: A comment belongs to a user (optional if you want to associate comments with users)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function replies()
    {
        return $this->hasMany(Reply::class);
    }

}
