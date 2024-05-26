<?php

namespace Jmrashed\Ecommerce\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\File;

class InstallEcommercePackage extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'ecommerce:install';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Install the Ecommerce package';

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->info('Installing Ecommerce package...');


        if (!$this->configExists('ecommerce.php')) {
            $this->publishConfiguration();
            $this->info('Published configuration');
        } else {
            if ($this->shouldOverwriteConfig()) {
                $this->info('Overwriting configuration file...');
                $this->publishConfiguration($force = true);
            } else {
                $this->info('Existing configuration was not overwritten');
            }
        }

        $this->info('Installed Ecommerce package');
    }

    /**
     * Check if the configuration file already exists.
     *
     * @param string $fileName
     * @return bool
     */
    private function configExists($fileName)
    {
        return File::exists(config_path($fileName));
    }

    /**
     * Ask the user if they want to overwrite the existing configuration file.
     *
     * @return bool
     */
    private function shouldOverwriteConfig()
    {
        return $this->confirm(
            'File already exists. Do you want to overwrite it?',
            false
        );
    }

    /**
     * Publish the configuration file and other resources.
     *
     * @param bool $forcePublish
     * @return void
     */
    private function publishConfiguration($forcePublish = false)
    {
        $resources = [
            'config' => ['--tag' => 'config'],
            'views' => ['--tag' => 'views'],
            'assets' => ['--tag' => 'assets'],
            'lang' => ['--tag' => 'lang']
        ];

        foreach ($resources as $resourceType => $params) {
            if ($forcePublish === true) {
                $params['--force'] = true;
            }
            $this->call('vendor:publish', $params);

            //     Log::info("Resource '$resourceType'");
            // if (!$this->resourceExists($resourceType)) {
            //     Log::info("params '$params'");
            //     $this->info("Published {$resourceType} for Ecommerce package");
            // } else {
            //     $this->info("Existing {$resourceType} was not overwritten");
            // }
        }
    }

    /**
     * Check if the resource already exists.
     *
     * @param string $resourceType
     * @return bool
     */
    private function resourceExists($resourceType)
    {
        switch ($resourceType) {
            case 'config':
                return File::exists(config_path('ecommerce.php'));
            case 'views':
                return File::exists(resource_path('views/vendor/jmrashed/ecommerce'));
            case 'assets':
                return File::exists(public_path('vendor/jmrashed/ecommerce'));
            case 'lang':
                return File::exists(resource_path('lang/vendor/jmrashed/ecommerce'));
            default:
                return false;
        }
    }
}
