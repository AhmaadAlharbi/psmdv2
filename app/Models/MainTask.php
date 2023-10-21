<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class MainTask extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'main_tasks';
    protected $guarded = [];

    public function section_tasks()
    {
        return $this->hasMany(SectionTask::class, 'main_tasks_id');
    }
    public function task_file()
    {
        return $this->hasMany(TaskAttachment::class, 'main_tasks_id');
    }

    public function station()
    {
        return $this->belongsTo(Station::class, 'station_id');
    }
    public function main_alarm()
    {
        return $this->belongsTo(MainAlarm::class, 'main_alarm_id');
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function engineer()
    {
        return $this->belongsTo(User::class, 'eng_id');
    }
    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
    public function departments()
    {
        return $this->belongsToMany(Department::class, 'department_id')
            ->withPivot('status');
    }
    public function conversions()
    {
        return $this->hasMany(TaskConversions::class, 'main_tasks_id', 'id');
    }
    public function departmentsAssienments()
    {
        return $this->hasMany(department_task_assignment::class, 'main_tasks_id', 'id');
    }
    public function taskTimelines()
    {
        return $this->hasMany(TaskTimeline::class, 'main_tasks_id');
    }
}
