<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileActivity extends Model
{
    protected $table = 'setting_file_activities';
    protected $guarded = [];

    use HasFactory;
}
