<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryPicModel extends Model
{
    use HasFactory;

    protected $table = 'gallery_pic';

    protected $fillable = [
        'gallery_id',
        'pic_url',
    ];
}
