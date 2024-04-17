<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class QRLogin extends Model
{
    use HasFactory;
    protected $table = 'qr_codes';
    protected $guarded = ['updated_at'];
    protected $fillable = [
        'userName',
        'role',
        'job',
        'name',
        'geo',
        'ip',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(Employee::class);    
    }
}
