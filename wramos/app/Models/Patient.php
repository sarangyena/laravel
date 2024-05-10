<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;
    protected $fillable = [
        'pType',
        'first',
        'last',
        'address',
        'phone',
        'gender',
        'email',
        'bday',
        'reference',
        'services',
        'payment',
        'status',
        'date',
    ];
}
