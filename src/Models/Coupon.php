<?php
namespace Ecommerce\Models;

use Illuminate\Database\Eloquent\Model;

class Coupon extends Model
{
    protected $table    = 'pkg_coupons';
    protected $fillable = [
        'code', 'discount_type', 'discount_amount', 'expires_at', 'usage_limit', 'used_count', 'active',
    ];

    public function isValid()
    {
        return $this->active && ($this->usage_limit === null || $this->used_count < $this->usage_limit) && ($this->expires_at === null || $this->expires_at > now());
    }
}
