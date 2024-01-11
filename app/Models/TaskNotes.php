<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskNotes extends Model
{
    protected $guarded = [];
    use HasFactory;
    public function departmentTask()
    {
        return $this->belongsTo(department_task_assignment::class, 'department_task_assignment_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function engineer()
    {
        return $this->belongsTo(User::class, 'eng_id');
    }
}