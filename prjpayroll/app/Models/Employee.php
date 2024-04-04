<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Employee extends Model
{
    use HasFactory;
    protected $fillable = [ 
        'role',
        'userName',
        'last',
        'first',
        'middle',
        'status',
        'email',
        'phone',
        'job',
        'sss',
        'philhealth',
        'pagibig',
        'rate',
        'address',
        'eName',
        'ePhone',
        'eAdd',
        'created_by',
        'password',
    ];

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
