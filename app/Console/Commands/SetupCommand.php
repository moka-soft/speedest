<?php

namespace App\Console\Commands;

use App\Actions\Fortify\CreateNewUser;
use Illuminate\Console\Command;

class SetupCommand extends Command
{
    protected $signature = 'speedest:setup';

    protected $description = 'Setup assistant';

    private const DEFAULT_ADMIN_NAME = 'Usain Bolt';

    private const DEFAULT_ADMIN_EMAIL = 'usain@speedest.dev';

    private const DEFAULT_ADMIN_PASSWORD = 'UsainBolt';

    public function handle()
    {
        $this->call('speedest:install');

        $this->info("\nSpeedest Setup");
        $this->info("--------------------\n");

        $this->info('Migrating database');

        $migrateStatus = $this->call('migrate:status');
        $this->call('migrate', ['--force' => true]);

        if (!$migrateStatus){
            $overwriteDatabase = $this->choice(
                'Database already migrated, you want overwrite ?',
                [
                    'Not',
                    'Yes'
                ],
                'Not'
            );
            if ($overwriteDatabase === 'Yes'){
                $this->call('migrate:fresh', ['--force' => true]);
                $this->info('Seeding required data in database');
                $this->call('db:seed', ['--force' => true]);
                $this->call('speedest:install');
                $this->info('Seeding fake data in database');
                $this->call('db:seed', ['--force' => true, '--class' => 'Database\Seeders\FakerDatabaseSeeder']);
                $this->info('Set up admin account');
                $this->setUpAdminAccount();
            }
        }

        $this->info('✅ Everything succeeded ✅');
    }

    private function setUpAdminAccount(): void
    {
        $this->info("Creating default own account");

        (new CreateNewUser)->create([
            'name' => self::DEFAULT_ADMIN_NAME,
            'email' => self::DEFAULT_ADMIN_EMAIL,
            'password' => self::DEFAULT_ADMIN_PASSWORD,
            'password_confirmation' => self::DEFAULT_ADMIN_PASSWORD,
            'terms' => true,
        ]);

        $this->comment(
            sprintf('Log in with email %s and password %s', self::DEFAULT_ADMIN_EMAIL, self::DEFAULT_ADMIN_PASSWORD)
        );
    }
}
