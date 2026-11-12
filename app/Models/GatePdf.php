<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GatePdf extends Model
{
    use HasFactory;
    protected $fillable = [
        'gate_id',
        'name',
        'link',
    ];

    public function gate()
    {
        return $this->belongsTo(Gate::class,'gate_id');
    }
}
