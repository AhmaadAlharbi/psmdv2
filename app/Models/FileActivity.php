<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileActivity extends Model
{
    protected $table = 'setting_file_activities';
    protected $guarded = [];


    use HasFactory;
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function relayFiles()
    {
        return $this->belongsTo(FileRelaySetting::class, 'file_id');
    }
}
