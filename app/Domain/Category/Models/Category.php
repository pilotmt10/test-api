<?php

namespace App\Domain\Category\Models;

use App\Domain\Product\Models\Product;
use Database\Factories\CategoryFactory;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property Product[]|Collection $products
 */
class Category extends Model
{
    use HasFactory;

    protected $table = 'categories';

    protected $fillable = [
        'name'
    ];

    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'categories_products');
    }

    protected static function newFactory()
    {
        return CategoryFactory::new();
    }
}
