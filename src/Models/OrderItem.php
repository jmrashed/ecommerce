<?php

namespace Jmrashed\Ecommerce\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    use HasFactory;

    protected $table = "pkg_order_items";
    protected $fillable = [
        
    ];
}
