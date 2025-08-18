<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EvaluationClassModel extends Model
{
    use HasFactory;

    protected $table = 'evaluation_class';

    protected $fillable = [
        'class_id',
        'category_id',
        'value',
        'note_value',
        'note',
    ];
}
