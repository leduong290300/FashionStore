<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PhotoBanners extends Model
{
    use HasFactory;

    public function getCategories()
    {
        return $this->belongsTo(Categories::class);
    }


}
