<?php

namespace Jmrashed\Ecommerce\Services;

use Jmrashed\Ecommerce\Repositories\ProductRepository;

class ProductService
{
    protected $productRepository;

    public function __construct(ProductRepository $productRepository)
    {
        $this->productRepository = $productRepository;
    }

    /**
     * Get all products.
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */
    public function getAllProducts()
    {
        return $this->productRepository->all();
    }

    // Add more methods as needed for additional business logic
}
