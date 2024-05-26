<?php

namespace Jmrashed\Ecommerce\Repositories;
use Jmrashed\Ecommerce\Models\Product;

class ProductRepository
{
    /**
     * Get all products.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function all()
    {
        return Product::all();
    }

}
