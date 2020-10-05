<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('user')) 
        {
            $numberOfUsers = $this->command->ask("Enter Number of Users to Create", 1);

            for($i = 0; $i < $numberOfUsers; $i++)
            {
                $user           = new User();
                $user->APP_ID   = strtoupper(substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*'), 0, 10));
                $user->APP_KEY  = strtoupper(substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ!@#$%^&*'), 0, 10));
                $user->save();
            }

            $this->command->comment("Users Created Successfully");
        } else {

            $this->command->error("User Table Not Found");
        }
    }
}
