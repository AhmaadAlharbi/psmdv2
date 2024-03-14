<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EquipController extends Controller
{
    public function index()
    {
        return view('dashboard.stations.equip.index');
    }
}
