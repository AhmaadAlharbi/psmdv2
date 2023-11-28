<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\FileActivity;
use Illuminate\Http\Request;
use App\Models\FileRelaySetting;

class FileRelaySettingController extends Controller
{
    public function index()
    {
        $settings = FileRelaySetting::all();
        return view('relaySetting.indexfiles', ['settings' => $settings]);
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'station_id' => 'required|exists:stations,id',
        //     'filename' => 'required',
        //     'file' => 'required|file|mimes:pdf,doc,docx,txt|max:10240', // Adjust the allowed file types and max size
        // ]);

        $file = $request->file('file');
        $originalFileName = $file->getClientOriginalName(); // Get the original file name

        $path = $file->storeAs('files', $originalFileName, 'public'); // Store the file with its original name

        $settingFile = FileRelaySetting::create([
            'station_id' => $request->input('station_id'),
            'filename' => $originalFileName,
            'user_id' => auth()->user()->id, // Assuming you have authentication
            'path' => $path,
        ]);
        // Log the file upload activity
        FileActivity::create([
            'file_id' => $settingFile->id,
            'activity_type' => 'upload',
            'user_id' => auth()->user()->id,
        ]);
        return back();
    }

    public function show($id)
    {
        $setting = FileRelaySetting::findOrFail($id);
        return view('relaySetting.show', ['setting' => $setting]);
    }
    public function create()
    {
        $stations = Station::all();
        return view('relaySetting.create', compact('stations'));
    }

    public function edit($id)
    {
        $setting = FileRelaySetting::findOrFail($id);
        return view('relaySetting.edit', ['setting' => $setting]);
    }

    public function update(Request $request, $id)
    {
        $setting = FileRelaySetting::findOrFail($id);
        $setting->update($request->all());

        return redirect('/file-relay-settings/' . $id);
    }
}
