<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryModel extends Model
{
    use HasFactory;

    protected $table = 'gallery';

    protected $fillable = [
        'name',
        'type',
        'note',
    ];

    public function pics()
    {
        return $this->hasMany(GalleryPicModel::class, 'gallery_id');
    }
}
