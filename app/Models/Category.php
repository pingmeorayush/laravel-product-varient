<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'parent_id'
    ];

    /**
     * Get all products in this category
     * @return BelongsToMany
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class);
    }

    /**
     * This will give model's Parent
     * @return BelongsTo
     */
    public function parent(): BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * This will give model's Parent, Parent's parent, and so on until root.
     * @return BelongsTo
     */
    public function parentRecursive(): BelongsTo
    {
        return $this->parent()->with('parentRecursive');
    }

    /**
     * This will give model's children
     * @return HasMany
     */
    public function children(): HasMany
    {
        return $this->hasMany(self::class, 'parent_id');
    }

    /**
     * This will give model's Children, Children's Children and so on until last
     * @return HasMany
     */
    public function childrenRecursive()
    {
        return $this->children->with('childrenRecursive');
    }

    /**
     * This will give SKUs of the category
     * @return HasManyThrough
     */
    public function skus(): HasManyThrough
    {
        return $this->hasManyThrough(
            Sku::class,
            CategoryProduct::class,
            'category_id',
            'product_id',
            'id',
            'product_id'
        );
    }
}
