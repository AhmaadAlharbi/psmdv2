<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SharedTask extends Model
{
    use HasFactory;
    protected $table = 'shared_tasks';
    protected $guarded = [];
    public function main_task()
    {
        return $this->belongsTo(MainTask::class, 'main_task_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}