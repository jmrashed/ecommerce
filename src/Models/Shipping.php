<?php
namespace Ecommerce\Models;

use Illuminate\Database\Eloquent\Model;

class Shipping extends Model
{
    protected $table    = 'pkg_shippings';
    protected $fillable = [
        'name', 'cost', 'method', 'active',
    ];
}
