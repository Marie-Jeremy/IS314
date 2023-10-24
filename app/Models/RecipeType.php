<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class RecipeType extends Model
{
    protected $fillable = ['name'];

    public function users()
    {
        return $this->belongsToMany(User::class);
    }
}