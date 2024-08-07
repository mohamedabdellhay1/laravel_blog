<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        "id",
        "title",
        "slug",
        "description",
        "content",
        "category_id",
        "user_id",
        "status",
        "time",
    ];
}