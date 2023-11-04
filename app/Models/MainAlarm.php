<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MainAlarm extends Model
{
    use HasFactory;
    protected $table = 'main_alarm';
    protected $guarded = [];
    public function main_tasks()
    {
        return $this->hasMany(MainTask::class);
    }
    public function department()
    {
        return $this->belongsTo(Department::class);
    }
}
