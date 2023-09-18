<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskConversions extends Model
{
    use HasFactory;
    protected $table = 'task_conversions';
    protected $guarded = [];
    public function main_task()
    {
        return $this->belongsTo(MainTask::class, 'main_tasks_id');
    }
    public function mainTask()
    {
        return $this->belongsTo(MainTask::class, 'main_tasks_id', 'id');
    }
    public function engineer()
    {
        return $this->belongsTo(User::class, 'eng_id');
        //goes to section task table and see the value of eng_id
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'source_department');
    }
    public function toDepartment()
    {
        return $this->belongsTo(Department::class, 'destination_department');
    }
}
