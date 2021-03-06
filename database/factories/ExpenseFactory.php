<?php

namespace Database\Factories;

use App\Models\ExpenseCategory;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            //
            'amount' => $this->faker->randomNumber(3),
            'entry_date' => $this->faker->date('Y-m-d'),

            // doesn't work w/out user_id and expense_category_id
            'user_id' => User::all()->random()->id ?? 1,
            'expense_category_id' => ExpenseCategory::all()->random()->id ?? 1
        ];
    }
}
