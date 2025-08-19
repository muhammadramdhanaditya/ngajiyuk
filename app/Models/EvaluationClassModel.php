<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationClassModel extends Model
{
    use HasFactory;

    protected $table = 'evaluation_class';

    protected $fillable = [
        'category_class_id',
        'users_id',
        'value',
        'note_value',
        'note',
    ];

    public function categoryClass()
    {
        return $this->belongsTo(CategoryClassModel::class, 'category_class_id');
    }

    public function users()
    {
        return $this->belongsTo(UserModel::class, 'users_id');
    }

    // public function class()
    // {
    //     return $this->hasOneThrough(
    //         ClassModel::class,
    //         CategoryClassModel::class,
    //         'id',
    //         'id',
    //         'category_class_id',
    //         'class_id'
    //     );
    // }

    // // Relasi ke Category melalui CategoryClass
    // public function category()
    // {
    //     return $this->hasOneThrough(
    //         CategoryModel::class,
    //         CategoryClassModel::class,
    //         'id',
    //         'id',
    //         'category_class_id',
    //         'category_id'
    //     );
    // }

    public function class()
    {
        return $this->categoryClass->class;
    }

    public function category()
    {
        return $this->categoryClass->category;
    }
}
