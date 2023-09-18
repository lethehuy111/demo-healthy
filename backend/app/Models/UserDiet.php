<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class UserDiet extends Model
{
    use HasFactory;

    protected $table = "user_diets";
    public const STATUS_ACTIVE = 1;
    public const IN_STATUS_ACTIVE = 1;
    protected $fillable = [
        "user_id",
        "diet_id",
        "status"
    ];

    public function diet(): BelongsTo
    {
        return $this->belongsTo(Diet::class, 'diet_id', 'id');
    }
}
