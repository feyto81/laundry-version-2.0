<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Hash;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $init = new User;
        $init->name = "admin";
        $init->username = "Administrator";
        $init->email = "admin@gmail.com";
        $init->password = Hash::make("123456");
        $init->photo = "NULL";
        $init->outlet_id = "1";
        $init->save();
        $init->assignRole('Administrator');

        $init = new User;
        $init->name = "kasir";
        $init->username = "Kasir";
        $init->email = "kasir@gmail.com";
        $init->password = Hash::make("123456");
        $init->photo = "NULL";
        $init->outlet_id = "1";
        $init->save();
        $init->assignRole('Kasir');

        $init = new User;
        $init->name = "owner";
        $init->username = "Owner";
        $init->email = "owner@gmail.com";
        $init->password = Hash::make("123456");
        $init->photo = "NULL";
        $init->outlet_id = "1";
        $init->save();
        $init->assignRole('Owner');
    }
}
