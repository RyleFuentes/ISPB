<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function agents()
    {
        return $this->hasMany(Agent::class);
    }

    public function categories()
    {
        return $this->belongsTo(Category::class);
    }
}
