<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TagNew extends Model
{
    use HasFactory;

    protected $table="tag_news";

    protected $fillable = [
        "tag_id",
        "new_id"
    ];
}
