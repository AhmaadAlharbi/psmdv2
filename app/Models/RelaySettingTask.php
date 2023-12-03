<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RelaySettingTask extends Model
{
    use HasFactory;
    protected $table = 'relay_setting_tasks';
    protected $guarded = [];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
