<?php

namespace App\Models;

use App\Models\Brand;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $guarded = [
        'product_id',
         
    ];

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brandID', 'brand_id');
    }
    
}