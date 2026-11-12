<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TelDir extends Model
{
    use HasFactory;

    protected $fillable = [
        'rank',
        'name',
        'appointment',
        'br',
        'dos',
        'tos',
        'nfs',
        'intercom',
    ];
}
