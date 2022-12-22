<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inventory extends Model
{
    use HasFactory;
    protected $fillable=['product_id','unit_id','amount'];

     public function product()
    {
        return $this->belongsTo('App\Models\Product','product_id')->withDefault();
    }
    public function unit()
    {
        return $this->belongsTo('App\Models\Unit','unit_id')->withDefault();
    }
}
