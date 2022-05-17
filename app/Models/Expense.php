<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    public function categories()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id', 'id', 'expense_categories_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
