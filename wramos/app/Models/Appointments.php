<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Appointments extends Model
{
    use HasFactory;
    protected $fillable = [
        'appointment_id',
        'services',
        'date',
        'amount',
        'recommendation',
        'total',
        'allServices',
        'minified',
    ];
}
