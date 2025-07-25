<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TransactionModel extends Model
{
    use HasFactory;

    protected $table = 'transaction';

    protected $fillable = [
        'class_id',
        'bukti_transfer_url',
        'is_accepted',
    ];


    public function class()
    {
        return $this->belongsTo(ClassModel::class, 'class_id');
    }
}
