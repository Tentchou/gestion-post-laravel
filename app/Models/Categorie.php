<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categorie extends Model
{
    use HasFactory;

    public function getRouteKeyName():string{
        return 'slug'; 
    }

    public function Posts():HasMany
    {
        return $this->hasMany(Post::class);
    }
}
