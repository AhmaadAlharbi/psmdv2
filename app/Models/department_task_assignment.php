<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class department_task_assignment extends Model
{
    use HasFactory;
    protected $table = 'department_task_assignment';
    protected $guarded = [];
    public function main_task()
    {
        return $this->belongsTo(MainTask::class, 'main_tasks_id');
    }
    public function engineer()
    {
        return $this->belongsTo(User::class, 'eng_id');
        //goes to section task table and see the value of eng_id
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
