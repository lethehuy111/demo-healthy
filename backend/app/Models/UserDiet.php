<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
