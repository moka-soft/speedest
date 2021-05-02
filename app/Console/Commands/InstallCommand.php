<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class InstallCommand extends Command
{
    protected $signature = 'speedest:install';

    protected $description = 'Install speedest';

    public function handle()
    {
        $this->info("\nSpeedest Installer");
        $this->info("--------------------\n");

        $this->maybeGenerateAppKey();

        // Publish vendor assets
        $this->call('vendor:publish', ['--tag' => 'livewire-ui:public', '--force']);
        $this->call('vendor:publish', ['--tag' => 'public', '--provider' => 'LaravelViews\LaravelViewsServiceProvider', '--force']);

        $this->info('✅ Everything succeeded ✅');
    }

    private function maybeGenerateAppKey(): void
    {
        if (!config('app.key')) {
            $this->info('Generating app key');
            $this->call('key:generate');
        } else {
            $this->comment('App key exists -- skipping');
        }
    }
}
