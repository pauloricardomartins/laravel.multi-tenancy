<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Facades\File;

use function Laravel\Prompts\text;
use function Pest\Laravel\artisan;

class TenancyCreate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'tenancy:create';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $name = text('Gibe me a name');
        $domain = text('The domain');
        $database = explode('.', $domain)[0] . '.sqlite';

        // //CRIAR BANCO DE DADOS
        // $databasePath = database_path($database);
        // if (!File::exists($databasePath)) {
        //     File::put($databasePath, '');
        // }

        //RODAS MIGRATIONS
        Config::set('database.default', 'sqlite');
        Config::set('database.connections.sqlite.database', $database);
        $this->call('migrate');
    }
}
