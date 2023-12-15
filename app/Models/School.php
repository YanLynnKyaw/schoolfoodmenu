<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['school_name'];
    public function canteens()
    {
        return $this->hasMany(Canteen::class);
    }
}
