<?php

namespace Ecommerce\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Tag extends Model
{
    use HasFactory;

    protected $table = 'pkg_tags';

    protected $fillable = [
        'name',
    ];

    /**
     * The products that belong to the tag.
     */
    public function products(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'pkg_product_tag');
    }
}