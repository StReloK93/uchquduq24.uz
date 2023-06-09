<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "post";

    protected $with = [
        'images',
    ];

    protected $casts = [
        'created_at' => 'date:Y-m-d',
    ];

    protected $fillable = ['post_name', 'post_desc', 'created_at', 'post_type', 'post_img', ];


    public function images()
    {
        return $this->hasMany(PostImage::class);
    }
}
