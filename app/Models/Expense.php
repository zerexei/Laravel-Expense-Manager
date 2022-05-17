<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Expense extends Model
{
    use HasFactory;

    protected $fillable = ['expense_category_id', 'amount', 'entry_date', 'user_id'];

    public function categories()
    {
        return $this->belongsTo(ExpenseCategory::class, 'expense_category_id', 'id', 'expense_categories_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function createdAt(): Attribute
    {
        return Attribute::get(fn($value) => Carbon::parse($value)->format('m-d-Y:H-i-s'));
    }
}
