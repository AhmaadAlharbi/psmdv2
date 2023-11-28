<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FileRelaySetting extends Model
{
    protected $table = 'setting_files';
    protected $guarded = [];

    use HasFactory;
}
