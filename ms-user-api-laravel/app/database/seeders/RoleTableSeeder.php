<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $roles = ['user', 'admin'];
        foreach ($roles as $role) {
            \Spatie\Permission\Models\Role::create([
                'name'       => $role,
                'guard_name' => 'api'
            ]);
        }
    }
}
