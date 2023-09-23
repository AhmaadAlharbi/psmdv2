<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskTimeline extends Model
{
    protected $table = 'tasks_timeline';
    protected $guarded = [];
    use HasFactory;
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
        return $this->belongsTo(Department::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
