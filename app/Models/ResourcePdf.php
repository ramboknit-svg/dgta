<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ResourcePdf extends Model
{
    use HasFactory;
    protected $fillable = [
        'resource_id',
        'name',
        'link',
    ];

    public function resource()
    {
        return $this->belongsTo(Resource::class,'resource_id');
    }
}
