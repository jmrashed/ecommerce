<?php

namespace Jmrashed\Ecommerce\Tests\Unit;

use Jmrashed\Ecommerce\Models\Product;
use Jmrashed\Ecommerce\Tests\TestCase;

class ProductTest extends TestCase
{
    public function test_product_can_be_created()
    {
        $product = new Product([
            'name' => 'Test Product',
            'price' => 19.99,
            'description' => 'Test description'
        ]);

        $this->assertEquals('Test Product', $product->name);
        $this->assertEquals(19.99, $product->price);
        $this->assertEquals('Test description', $product->description);
    }

    public function test_product_has_fillable_attributes()
    {
        $product = new Product();
        $fillable = $product->getFillable();

        $this->assertContains('name', $fillable);
        $this->assertContains('price', $fillable);
        $this->assertContains('description', $fillable);
    }
}