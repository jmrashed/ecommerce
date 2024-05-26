<?php

namespace Jmrashed\Ecommerce\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $table="pkg_categories";

    protected $fillable = [
        'name',  
        'slug', 
        'status', 
    ];
}
