<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BranchDetail extends Model
{
    use HasFactory;
     protected $fillable = ['branch_id', 'watch_title', 'watch_image','new_images','new_title'];

     public function branch()
    {
        return $this->belongsTo(Branch::class,'branch_id');
    }
}
