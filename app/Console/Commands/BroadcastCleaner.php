<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\File;

class BroadcastCleaner extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'broadcast:clear';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Чистка .ts файлов потока';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        File::delete(File::glob(public_path() . '/hls/*.ts'));
        return Command::SUCCESS;
    }
}
