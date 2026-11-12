<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Bulletin extends Model
{
    use HasFactory;
      protected $fillable = ['name', 'slug', 'role','description','duty'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($bulletin) {
            $bulletin->slug = Str::slug($bulletin->name);
        });
    }
}
