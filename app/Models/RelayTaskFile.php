<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class RelayTaskFile extends Model
{
    protected $table = 'relay_settings_tasks_files';
    protected $guarded = [];
    use SoftDeletes;

    public function task()
    {
        return $this->belongsTo(RelaySettingTask::class);
    }
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function activity()
    {
        return $this->hasMany(RelayTaskFilesActivity::class, 'file_id');
    }
    use HasFactory;
}
