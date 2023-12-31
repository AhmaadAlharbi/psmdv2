<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FileRelaySetting extends Model
{
    protected $table = 'setting_files';
    protected $guarded = [];
    use SoftDeletes;
    use HasFactory;
    public function station()
    {
        return $this->belongsTo(Station::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function activity()
    {
        return $this->hasMany(FileActivity::class, 'file_id');
    }
}
