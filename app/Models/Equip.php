<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equip extends Model
{
    use HasFactory;
    protected $table = 'equip';
    public function station()
    {
        return $this->belongsTo(Station::class);
    }
}
