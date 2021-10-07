<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','title','image'
    ];

    public function getProduct()
    {
        return $this->hasOne(Products::class,'id');
    }
}
