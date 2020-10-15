<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use App\Models\User;
use App\Models\PartnerDetails;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        if (Schema::hasTable('partner')) 
        {
            $numberOfUsers = $this->command->ask("Enter Number of Users to Create", 1);

            $autoGenerate = $this->command->ask("Auto Generate Username, Password default(test@123) etc ? Yes : 1 | No : 2", 1);

            for($i = 0; $i < $numberOfUsers; $i++)
            {
                $user           = new User();

                if($autoGenerate == 1)
                {
                    $user->PARTNER_NAME = strtoupper(substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 6));
                    $user->PARTNER_USERNAME = strtoupper(substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 7));
                    $user->PARTNER_PASSWORD = Hash::make("test@123");
                } else 
                {
                    $name = $this->command->ask("Enter Name of User");
                    $username = $this->command->ask("Enter User Name of User");
                    $password = $this->command->secret("Enter Password of User");

                    $user->PARTNER_NAME = $name;
                    $user->PARTNER_USERNAME = $username;
                    $user->PARTNER_PASSWORD = Hash::make($password);
                }

                $user->PARTNER_STATUS       = User::STATUS_ACTIVE;
                $user->PARTNER_DESCRIPTION  = "Seeded User";
                $user->save();

                $partnerDetails                 = new PartnerDetails();
                $partnerDetails->PARTNER_ID     = $user->PARTNER_ID;
                $partnerDetails->PARTNER_KEY    = bin2hex(random_bytes(20));
                $partnerDetails->BONUS_UPDATE_SERVICE_URL = "http://localhost/";
                $partnerDetails->PARTNER_DETAILS_STATUS = 1;
                $partnerDetails->save();
            }

            $this->command->comment("Users Created Successfully");
        } else {

            $this->command->error("User Table Not Found");
        }
    }
}
