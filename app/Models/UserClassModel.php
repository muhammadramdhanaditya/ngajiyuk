<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserClassModel extends Model
{
    use HasFactory;

    protected $table = 'user_class';

    protected $fillable = [
        'users_id',
        'class_id',
        'transaction_id',
        'visibility',
    ];


    public function users()
    {
        return $this->belongsTo(UserModel::class, 'users_id');
    }

    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }

    public function transaction()
    {
        return $this->belongsTo(TransactionModel::class, 'transaction_id');
    }
}
