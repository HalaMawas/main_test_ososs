<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name'
    ];

    protected $appends = [
        'total_quantity',
        'image_path',
    ];

    public function units()
    {
        //
    }

    public function getTotalQuantityAttribute()
    {
        return null;
    }

    public function getImagePathAttribute()
    {
        return null;
    }

    public function inventories(){
        return $this->hasMany('App\Models\Inventory','product_id');
    }

     public function product()
    {
        return $this->belongsTo('App\Models\Image','o_id')->where('o_type','product')->withDefault();
    }

    public function image()
    {
        return $this->belongsTo('App\Models\Image','id','o_id')->where('o_type','product')->withDefault();
    }

}
