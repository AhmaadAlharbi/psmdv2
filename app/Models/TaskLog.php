<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TaskLog extends Model
{
    use HasFactory;
    protected $table = 'task_logs';
    protected $fillable = ['task_id', 'user_id', 'task_type', 'assigned_time', 'completed_time', 'time_taken', 'is_late'];
    const TASK_TYPE_NORMAL = 0; // Use integers to represent task types
    const TASK_TYPE_EMERGENCY = 1;
    public function assignment()
    {
        return $this->belongsTo(DepartmentTaskAssignment::class, 'task_id', 'id');
    }

    // Define the inverse relationship for the engineer
    public function engineer()
    {
        return $this->belongsTo(Engineer::class, 'engineer_id', 'user_id');
    }
}
