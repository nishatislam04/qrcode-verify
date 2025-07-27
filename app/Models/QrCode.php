<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class QrCode extends Model
{
    /** @use HasFactory<\Database\Factories\QrCodeFactory> */
    use HasFactory;

    protected $fillable = [
        'code',
        'user_id',
        'fingerprint',
        'name',
        'email',
        'phone',
        'registered_at',
        'scanned_at',
        'scanned_ip',
        'scanned_by_user_id',
    ];
}
