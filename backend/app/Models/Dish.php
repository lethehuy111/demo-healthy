<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Dish extends Model
{
    use HasFactory;
    const LINK_FILE = "images/dishs/";

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

    /**
     * @return string
     */
    public function getFullImageAttribute(): string
    {
        return url(Storage::url(self::LINK_FILE . $this->image));
    }
}
