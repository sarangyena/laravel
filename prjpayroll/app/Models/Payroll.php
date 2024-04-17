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
        'employee_id',
        'userName',
        'week_id',
        'week',
        'job',
        'rate',
        'rph',
        'holiday',
        'pagibig',
        'philhealth',
        'sss',
        'advance',

    ]; 

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);    
    }
}
