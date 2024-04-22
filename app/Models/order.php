<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order extends Model
{
    use HasFactory;
    protected $fillable=[
        'firstname',
        'lastname', 
        'email',
        'phonenumber',
        'region',
        'district',
        'ward',
        'street',
        'user_id',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
