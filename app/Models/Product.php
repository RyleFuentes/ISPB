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

    public static function TotalProducts()
    {
        return self::count();
    }

    public function getPendingOrderQuantityAttribute()
    {
        // Sum the order quantities for pending orders of the specific product
        return $this->orders()
            ->where('status', 0) // Adjust the status condition as needed
            ->where('order_type', 2)
            ->pluck('order_quantity')
            ->sum();
    }

    public function getPendingOrderKiloAttribute()
    {
        // Sum the order quantities for pending orders of the specific product
        return $this->orders()
            ->where('status', 0)
            ->where('order_type', 1)
            ->pluck('order_kilo')
            ->sum();
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
