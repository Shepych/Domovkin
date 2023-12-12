<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class ChangePassword extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'password:change';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Change user password';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $this->info('Users list:');
         $users = User::all();
         foreach($users as $item) {
             echo '[ID: ' . $item->id . '] ' . $item->login . "\n";
         }
         $userId = $this->ask('Enter user ID:');
         $user = User::find($userId);
         if(!$user) {
             return $this->error('User not found');
         }
         $newPassword = Str::random(20);
         $hash = Hash::make($newPassword);
         $user->password = $hash;
         $user->save();
         $this->info('New password: ' . $newPassword);
    }
}
