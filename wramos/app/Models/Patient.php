<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

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
    public function appointment(): HasMany
    {
        return $this->hasMany(Appointments::class);    
    }
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);    
    }
    public function payment(): HasMany
    {
        return $this->hasMany(Payment::class);    

    }
}
