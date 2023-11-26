<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Batch extends Model
{
    use HasFactory;

    protected $guarded = ['batch_id'];
    protected $primaryKey = 'batch_id';

    public function product()
    {
        $this->belongsTo(Product::class, 'productID', 'product_id');
    }
}
