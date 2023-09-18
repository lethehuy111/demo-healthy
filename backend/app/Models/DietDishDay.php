<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Facades\Storage;

class DietDishDay extends Model
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

    protected $casts = [
        'date' => 'datetime'
    ];

    public function userDiet(): BelongsTo
    {
        return $this->belongsTo(UserDiet::class, 'user_diet_id' , 'id');
    }

    public function dish(): BelongsTo
    {
        return $this->belongsTo(Dish::class, 'dish_id' , 'id');
    }
}
