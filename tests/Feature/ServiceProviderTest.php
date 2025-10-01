<?php

namespace Jmrashed\Ecommerce\Tests\Feature;

use Jmrashed\Ecommerce\EcommerceServiceProvider;
use Jmrashed\Ecommerce\Tests\TestCase;

class ServiceProviderTest extends TestCase
{
    public function test_service_provider_is_loaded()
    {
        $providers = $this->app->getLoadedProviders();
        
        $this->assertArrayHasKey(EcommerceServiceProvider::class, $providers);
    }

    public function test_config_is_published()
    {
        $this->assertTrue(true); // Placeholder for config publishing test
    }
}