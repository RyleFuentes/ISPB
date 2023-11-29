<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    protected $guarded = [
        'product_id',

    ];



    public function getTotalQuantityAttribute()
    {
        // Sum the quantity from related batches
        return $this->batch->sum('quantity');
    }

    public function getPendingOrderQuantityAttribute()
    {
        // Sum the order quantities for pending orders of the specific product
        return $this->orders()
            ->where('status', 0) // Adjust the status condition as needed
            ->sum('order_quantity');
    }

    protected $primaryKey = 'product_id';

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brandID', 'brand_id');
    }

    public function batch()
    {
        return $this->hasMany(Batch::class, 'productID');
    }

    public function orders()
    {
        return $this->hasMany(Order::class, 'productID');
    }
}
