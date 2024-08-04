<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

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
