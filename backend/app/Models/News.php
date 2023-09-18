<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Support\Facades\Storage;

/**
 *
 */
class News extends Model
{
    use HasFactory;

    /**
     * @var string
     */
    protected $table = 'news';
    /**
     *
     */
    const LINK_FILE = "/images/news/";
    /**
     *
     */
    const STATUS_ACTIVE = 1;

    /**
     * @var string[]
     */
    protected $fillable = [
        "title",
        "image",
        "slug",
        "contents",
        "status"
    ];
    /**
     * @var string[]
     */
    protected $casts = [
        'updated_at' => 'datetime'
    ];

    /**
     * @return BelongsToMany
     */
    public function tags(): BelongsToMany
    {
        return $this->belongsToMany(Tag::class, 'tag_news', 'new_id', 'tag_id');
    }

    /**
     * @return string
     */
    public function getFullImageAttribute(): string
    {
        return url(Storage::url(self::LINK_FILE . $this->image));
    }
}
