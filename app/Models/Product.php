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


    public function deductKilo($orderQuantity)
    {
        // $remaining_kilo = $this->kilo_amount - $orderQuantity;

        $remainingKilos = max(0, $this->kilo_amount - $orderQuantity);
        $bagsToDeduct = floor(($this->kilo_amount - $remainingKilos) / 50);

        if ($orderQuantity > 50) {

            $nearestBatch = $this->nearest_batch;
            if ($nearestBatch) {
                $batchQty = max(0, $nearestBatch->quantity - $bagsToDeduct);
                $nearestBatch->update(['quantity' => $batchQty]);
            }
        }

        $this->kilo = $remainingKilos;

        // // Update the total_quantity attribute
        // $this->kilo_amount = max(0, $newTotalQuantity);
        $this->save();
    }

    

    public function getNearestBatchAttribute()
    {
        return $this->batch()
            ->where('expiration_date', '>', now()) // Only consider batches with future expiration dates
            ->orderBy('expiration_date', 'asc')    // Order by expiration date in ascending order
            ->first();
    }



    public function getTotalQuantityAttribute()
    {
        // Sum the quantity from related batches
        return $this->batch->sum('quantity');
    }

    public function getKiloAmountAttribute()
    {
        return $this->total_quantity * 50;
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
