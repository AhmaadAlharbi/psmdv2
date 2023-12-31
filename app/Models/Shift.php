<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shift extends Model
{
    use HasFactory;
    protected $fillable = [
        'shift',
    ];

    public function engineers()
    {
        return $this->belongsToMany(Engineer::class);
    }
}
