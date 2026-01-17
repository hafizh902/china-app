<?php

namespace App\Console\Commands;

use function exec;
use Illuminate\Console\Command;

class DeployTesting extends Command
{
    protected $signature = 'deploy:testing';
    protected $description = 'Deploy testing branch via cron';

    public function handle()
    {
        file_put_contents(
            storage_path('logs/deploy-cron.log'),
            now().' cron hit'.PHP_EOL,
            FILE_APPEND
        );
    
        $flag = storage_path('deploy_testing.flag');
    
        if (!file_exists($flag)) {
            return 0;
        }
    
        chdir('/home/kgtiqtfd/repositories/china-app');
    
        \exec('git checkout testing');
        \exec('git pull origin testing');
        \exec('/usr/local/bin/php artisan optimize:clear');
    
        unlink($flag);
    
        return 0;
    }
    
}
