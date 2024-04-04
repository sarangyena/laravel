<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Payroll extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'job',
        'rate',
        'rph',
    ]; 

    public function user(): BelongsTo
    {
        return $this->belongsTo(Employee::class);    
    }
}
