<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SectionDetail extends Model
{
    use HasFactory;
     protected $fillable = ['section_id', 'charter', 'updates'];

    public function section()
    {
        return $this->belongsTo(Section::class,'section_id');
    }
}
