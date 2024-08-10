<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Product extends Model
{
    use HasFactory, Sluggable;

    protected $fillable = [
        'name', 'harga', 'stok', 'slug'
    ];

    /**
     * Set up sluggable configuration for generating slugs from the name.
     */
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'name'
            ]
        ];
    }

    /**
     * Define the many-to-many relationship with Category.
     */
    public function categories(): BelongsToMany
    {
        // Adjust 'category_product' if your pivot table name is different.
        // Adjust 'product_id' and 'category_id' if your foreign key names are different.
        return $this->belongsToMany(Category::class, 'category_product', 'product_id', 'category_id');
    }
}

