<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProfileManagement extends Model
{
    use HasFactory;

    protected $table = "profiles";

    protected $guarded = [
        'profile_id',   
    ];

    protected $primaryKey = "profile_id";

   
}
