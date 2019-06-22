<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Role::create([
            'name' => 'admin',
            'description' => 'Administrador',
        ]);

        Role::create([
            'name' => 'investor',
            'description' => 'Inversionista',
        ]);
    }
}
