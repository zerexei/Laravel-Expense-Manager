<?php

namespace Database\Seeders;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DefaultSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        // create default roles
        Role::factory()->create(['name' => 'user']);
        $role = Role::factory()->Create(['name' => 'admin']);

        // create admin account
        $user = User::factory()->create([
            'email' => 'admin@mail.com',
            'password' => Hash::make('admin123')
        ]);
        $user->roles()->toggle([$role->id]);


        Role::factory(10)->create();
        ExpenseCategory::factory(10)->create();
        User::factory(10)->create()->each(function ($user) {
            $user->roles()->toggle([1]);
        });

        Expense::factory(100)->create();
    }
}
