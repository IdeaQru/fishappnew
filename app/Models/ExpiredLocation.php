<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ExpiredLocation extends Model
{
    protected $table = 'expired_locations'; // Pastikan ini cocok dengan nama tabel di database
    // Opsional, sesuaikan $fillable jika kamu ingin menggunakan mass assignment
    protected $fillable = ['lokasi', 'longitude', 'latitude', 'status', 'release_date', 'expiry_date', 'created_at', 'updated_at'];
}
