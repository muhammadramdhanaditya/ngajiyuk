<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClassModel extends Model
{
    use HasFactory;

    protected $table = 'class';

    protected $fillable = [
        'name',
        'type',
        'teacher_id',
        'location_id',
        'day',
        'time_start',
        'time_end',
        'timezome',
        'price',
        'color',
        'note',
    ];

    public function teacher()
    {
        return $this->belongsTo(TeacherModel::class, 'teacher_id');
    }

    public function location()
    {
        return $this->belongsTo(LocationModel::class, 'location_id');
    }
}
