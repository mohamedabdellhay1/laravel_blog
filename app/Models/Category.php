<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use HasFactory;
    use SoftDeletes;


    protected $fillable = [
        "id",
        "name",
        "slug",
        "status",
        "parent_id",
        "created_by",
        "updated_by",
        "deleted_by",
    ];

}