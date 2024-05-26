<?php

namespace Jmrashed\Ecommerce\Console\Commands;

use Illuminate\Console\Command;
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

        $this->info('Publishing configuration...');

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
            'Config file already exists. Do you want to overwrite it?',
            false
        );
    }

    /**
     * Publish the configuration file.
     *
     * @param bool $forcePublish
     * @return void
     */


    private function publishConfiguration($forcePublish = false)
    {
        $params = [
            '--provider' => "Jmrashed\Ecommerce\EcommerceServiceProvider",
            '--tag' => "config"
        ];

        if ($forcePublish === true) {
            $params['--force'] = true;
        }

        $this->call('vendor:publish', $params);
        $resources = [
            'views' => ['--tag' => 'views'],
            'routes' => ['--tag' => 'routes'],
            'migrations' => ['--tag' => 'migrations'],
            'assets' => ['--tag' => 'assets'],
        ];

        foreach ($resources as $resourceType => $params) {
            if ($forcePublish === true) {
                $params['--force'] = true;
            }

            $this->call('vendor:publish', $params);
            $this->info("Published {$resourceType} for Ecommerce package");
        }
    }
}
