<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietDishDays extends Model
{
    use HasFactory;

    protected $table = "diet_dish_days";

    public const STATUS_OPEN = 0;
    public const STATUS_DONE = 1;

    public const STATUS_CANCEL = 2;
    protected $fillable = [
        "date",
        "user_diet_id",
        "dish_id",
        "status"
    ];
}
