<?php

namespace Jmrashed\Ecommerce\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $table="pkg_brands";

    protected $fillable = [
        'name',  
        'slug', 
        'status', 
    ];
}
