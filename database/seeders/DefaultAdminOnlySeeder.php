<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultAdminOnlySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //Role::factory()->create(['name' => 'user']);
        $role = Role::factory()->Create(['name' => 'admin']);

        // create admin account
        $user = User::factory()->create([
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123')
        ]);
        $user->roles()->toggle([$role->id]);
    }
}
