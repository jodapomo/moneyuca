<?php

use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $adminRole = Role::where('name', 'admin')->first();
        $investorRole  = Role::where('name', 'investor')->first();


        $adminUser = new User();
        $adminUser->name = 'Admin';
        $adminUser->username = 'admin';
        $adminUser->password = bcrypt('123');
        $adminUser->role()->associate($adminRole);

        $adminUser->save();

        
        factory(User::class)->create([
            'name' => 'User',
            'username' => 'user',
            'oandaToken' => '92109d0aed0fd205d28ae2ef34a95372-4ea6cde58d199b6ed093856e346a1edc',
            'oandaId' => '101-011-11865205-001',
            'password' => bcrypt('123'),
            'role_id' => $investorRole->id,
            'validated' => True,
        ]);

        factory(User::class, 49)->create();
    }
}
