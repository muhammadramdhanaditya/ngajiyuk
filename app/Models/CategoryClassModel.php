<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryClassModel extends Model
{
    use HasFactory;

    protected $table = 'category_class';

    protected $fillable = [
        'class_id',
        'category_id',
    ];


    public function category()
    {
        return $this->belongsTo(CategoryModel::class, 'category_id');
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
}
