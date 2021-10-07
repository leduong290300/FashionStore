<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Products extends Model
{
    use HasFactory;

    protected $fillable = [
        'name','price','size','color','inventory','description_long',
        'description_short','category','code','photos'
    ];

    public function getCategories()
    {
        return $this->belongsTo(Categories::class);
    }
}
