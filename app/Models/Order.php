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
    

    public function product()
    {
        return $this->belongsTo(Product::class, 'productID', 'product_id');
    }

}
