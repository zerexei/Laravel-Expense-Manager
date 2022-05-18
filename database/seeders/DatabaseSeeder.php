<?php

namespace Database\Seeders;

use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

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

        Expense::factory(50)->create();


        // failed after adding attributes? or after laptop restart
        // $user->expenses()->createMany(Expense::factory(50)->make()->toArray());

        // // https://laravel.com/docs/9.x/eloquent-relationships#the-create-method
        // User::factory(10)->create()->each(function ($user) {
        //     $user->roles()->toggle([1]);
        //     $user->expenses()->createMany(
        //         Expense::factory(50)->make()->toArray()
        //     );
        // });
    }
}
