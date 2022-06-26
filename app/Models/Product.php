<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use SoftDeletes, HasFactory;

    protected $table = 'products';
    protected $quarded = false;

    protected $fillable =
    [
        'title',
        'description',
        'content',
        'preview_image',
        'price',
        'count',
        'is_published',
        'category_id',
        'updated_at',
        'deleted_at',
        'tags',
        'colors',
        'product_id',

    ];

    public function category() {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags() {
        return $this->belongsToMany(Tag::class, 'product_tags', 'product_id', 'tag_id');
    }
    public function colors() {
        return $this->belongsToMany(Color::class, 'color_products', 'product_id', 'color_id');
    }
}
