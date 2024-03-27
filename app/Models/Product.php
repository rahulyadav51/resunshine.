<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'product_name',
        'image',
        'price',
        'color',
        'quantity',
        'short_description',
        'description',
        'status',

    ];

    public function Category()
    {
        return $this->belongsTo(Category::class);
        // return $this->hasMany(Category::class);
    }
}
