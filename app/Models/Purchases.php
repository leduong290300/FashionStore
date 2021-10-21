<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Purchases extends Model
{
    use HasFactory;

    protected $fillable = [
      'code','name','size','color','image','quanlity','total_price','customers_id'
    ];

    public function customers()
    {
      return $this->belongsTo('Customers');
    }
}
