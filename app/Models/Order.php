<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $guarded = [
        'order_id',
         
    ];
    protected $primaryKey = 'order_id';
    
    public static function calculateTotalSales()
    {
        return self::where('status', 1)->sum('total_price');
    }

  

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'product_id');
    }

    
}
