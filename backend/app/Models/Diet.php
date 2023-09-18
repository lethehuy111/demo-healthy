<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Facades\Storage;

/**
 *
 */
class Diet extends Model
{
    use HasFactory;

    /**
     *
     */
    public const STATUS_ACTIVE = 1;
    /**
     *
     */
    public const IN_STATUS_ACTIVE = 1;
    /**
     *
     */
    public const LINK_FILE = 'icons/';

    /**
     * @var string
     */
    protected $table="diets";

    /**
     * @var string[]
     */
    protected $fillable = [
        "name",
        "icon",
        "status"
    ];

    /**
     * @return HasMany
     */
    public function userDiets(): HasMany
    {
        return $this->hasMany(UserDiet::class, 'diet_id', 'id');
    }

    /**
     * @return string
     */
    public function getFullIconAttribute(): string
    {
        return url(Storage::url(self::LINK_FILE . $this->icon));
    }
}
