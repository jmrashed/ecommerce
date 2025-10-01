<?php

namespace Ecommerce\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payment extends Model
{
    use HasFactory;

    protected $table = 'pkg_payments';

    protected $fillable = [
        'order_id',
        'amount',
        'payment_method',
        'status',
    ];

    /**
     * Get the order that the payment belongs to.
     */
    public function order(): BelongsTo
    {
        return $this->belongsTo(Order::class);
    }
}