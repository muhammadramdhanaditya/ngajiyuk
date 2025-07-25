<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SettingModel extends Model
{
    use HasFactory;

    protected $table = 'setting';

    protected $fillable = [
        'title_home',
        'note_home',
        'qr_code_url',
        'name',
        'name_bank',
        'number_bank',
    ];
}
