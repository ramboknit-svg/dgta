<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Branch extends Model
{
    protected $fillable = ['name', 'slug', 'role','description','duty','policy','head_name','designation','image'];

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($branch) {
            $branch->slug = Str::slug($branch->name);
        });
    }
}

