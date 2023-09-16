<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Diet extends Model
{
    use HasFactory;
    public const STATUS_ACTIVE = 1;
    public const IN_STATUS_ACTIVE = 1;
    protected $table="diets";

    protected $fillable = [
        "name",
        "icon",
        "status"
    ];
}
