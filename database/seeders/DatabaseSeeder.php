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
        $this->call([
            DefaultSeeder::class,
            // DefaultAdminOnlySeeder::class
        ]);

        // User::factory()->create();
        // Role::factory()->create();
        // ExpenseCategory::factory()->create();
        // Expense::factory()->create();


        //! failed after adding attributes? or after laptop restart
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
