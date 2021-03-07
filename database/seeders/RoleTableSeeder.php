<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'Administrator',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Kasir',
            'guard_name' => 'web'
        ]);
        Role::create([
            'name' => 'Owner',
            'guard_name' => 'web'
        ]);
    }
}
