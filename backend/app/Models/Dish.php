<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dish extends Model
{
    use HasFactory;

    protected $table = "dishs";

    public const STATUS_ACTIVE = 1;
    public const IN_STATUS_ACTIVE = 1;

    public const ROLE_PARENT = 1;
    public const ROLE_CHILD = 2;

    protected $fillable = [
        "name",
        "image",
        "role",
        "parent_id",
        "status"
    ];
}
