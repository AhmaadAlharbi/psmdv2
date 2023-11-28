<?php

namespace App\Http\Controllers;

use App\Models\FileActivity;
use Illuminate\Http\Request;

class FileActivityController extends Controller
{
    public function index()
    {
        $fileActivities = FileActivity::all();

        return view('relaySetting.index', ['fileActivities' => $fileActivities]);
    }
}
