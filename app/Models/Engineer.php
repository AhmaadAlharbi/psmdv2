<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Engineer extends Model
{
    use HasFactory;
    protected $table = 'engineers';
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function main_task()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
    public function taskLogs()
    {
        return $this->hasMany(TaskLog::class, 'engineer_id', 'user_id');
    }
    public function main_tasks()
    {
        return $this->hasMany(MainTask::class);
    }
    public function shifts()
    {
        return $this->belongsToMany(Shift::class, 'engineer_shift');
    }
}