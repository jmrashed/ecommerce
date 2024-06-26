<?php

namespace Jmrashed\Ecommerce\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "pkg_products";
    protected $fillable = [
        'name',
        'description',
        'price',
        'quantity',
        'image',
        'status',
    ];
}
