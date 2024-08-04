<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;
    use sluggable;


    protected $fillable = [
        'name', 'slug'
    ];
 
    public function sluggable(): array
{
    return [
        'slug' => [
            'source' => 'name'
        ]
    ];
}

}
