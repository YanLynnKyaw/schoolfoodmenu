<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Canteen extends Model
{
    protected $fillable = ['canteen_name'];
    public function school()
    {
        return $this->belongsTo(School::class);
    }
}
