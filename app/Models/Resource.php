<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resource extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_id',
        'name',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'category_id');
    }

    public function children()
    {
        return $this->hasMany(self::class, 'category_id', 'id')->with('children');
    }

}
