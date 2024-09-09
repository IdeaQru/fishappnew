<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    use HasFactory;

    protected $fillable = [
        'lokasi', 'longitude', 'latitude', 'status', 'release_date', 'expiry_date', 'user_id'
    ];
}
