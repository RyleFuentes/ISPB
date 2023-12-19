<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

  

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_brand_id');
    }

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }
}
