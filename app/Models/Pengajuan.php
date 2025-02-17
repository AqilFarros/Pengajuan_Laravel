<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pengajuan extends Model
{
    use HasFactory;

    public $fillable = [
        'pengajuan',
        'level',
        'status',
        'reply'
    ];
}
