<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HistoryHealth extends Model
{
    use HasFactory;

    protected $table="history_healths";

    public const TYPE_WEIGHT = 1;
    public const TYPE_BODY_FAT_PERCENT = 2;
    protected $fillable = [
        "user_id",
        "number",
        "type",
        "date"
    ];


    protected $casts = [
        'date' => 'datetime'
    ];
}
