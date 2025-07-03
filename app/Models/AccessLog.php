<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AccessLog extends Model
{
    protected $fillable = [
        'type',
        'accessed_at',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}