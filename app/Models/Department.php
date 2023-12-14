<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Department extends Model
{
    use HasFactory;
    protected $table = 'departments';
    protected $guarded = [];

    public function department()
    {
        return $this->hasMany(MainTask::class);
    }
    public function sharedTasks()
    {
        return $this->belongsToMany(MainTask::class, 'shared_tasks');
    }
}