<?php

namespace App\Http\Controllers;

use App\Models\Station;
use App\Models\FileActivity;
use Illuminate\Http\Request;
use App\Models\RelayTaskFile;
use App\Models\FileRelaySetting;
use Illuminate\Support\Facades\Storage;

class FileRelaySettingController extends Controller
{
    public function index()
    {
        $relaySettingFiles = FileRelaySetting::with('station')
            ->join('stations', 'setting_files.station_id', '=', 'stations.id')
            ->orderBy('stations.id')
            ->get();
        // Group files by station ID
        $groupedFiles = $relaySettingFiles->groupBy('station_id');

        // Select the first file from each group
        $uniqueStations = $groupedFiles->map(function ($group) {
            return $group->first();
        });

        // $relaySettingFiles = FileRelaySetting::all();
        return view('relaySetting.indexfiles', ['uniqueStations' => $uniqueStations]);
    }
    public function indexStation($id)
    {
        $relaySettingFiles = FileRelaySetting::where('station_id', $id)->get();
        return view('relaySetting.station.index', compact('relaySettingFiles', 'id'));
    }
    public function store(Request $request)
    {
        // $request->validate([
        //     'station_id' => 'required|exists:stations,id',
        //     'files.*' => 'required|file|mimes:pdf,doc,docx,txt|max:10240', // Adjust the allowed file types and max size
        // ]);

        $stationId = $request->input('station_id');
        $stationName = Station::where('id', $stationId)->value('SSNAME');


        if ($request->hasFile('files')) {
            foreach ($request->file('files') as $file) {
                // Process each uploaded file
                $path = $file->store("files/$stationName", 'public');
                // Store file information in the database
                $settingFile = FileRelaySetting::create([
                    'station_id' => $stationId,
                    'filename' => $file->getClientOriginalName(),
                    'user_id' => auth()->user()->id,
                    'path' => $path,
                ]);

                // Retrieve the just-created file's ID
                $fileId = $settingFile->id;
                FileActivity::create([
                    'filename' => $file->getClientOriginalName(),
                    'activity_type' => 'created',
                    'user_id' => auth()->user()->id,
                    'file_id' => $fileId
                ]);
            }

            // Additional logic or redirect after processing files
            return redirect('/file-relay-settings')->with('success', 'Files uploaded successfully');
        }

        // Handle case where no files are uploaded
        return redirect('/')->with('error', 'No files uploaded');
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
        $stations = Station::all();
        $setting = FileRelaySetting::findOrFail($id);
        return view('relaySetting.edit', compact('stations', 'setting'));
    }


    public function update(Request $request, $id)
    {
        $file = FileRelaySetting::findOrFail($id);

        // Validate the request data as needed
        $stationName = Station::where('id', $file->station_id)->value('SSNAME');

        if ($request->hasFile('new_file')) {
            // Handle the update process
            $uploadedFile = $request->file('new_file');
            $newPath = $uploadedFile->storeAs("files/$stationName", $uploadedFile->getClientOriginalName(), 'public');

            $file->update([
                'filename' => $uploadedFile->getClientOriginalName(),
                'user_id' => auth()->user()->id,
                'path' => $newPath,
                'station_id' => $request->input('station_id'),
                // Add other attributes as needed
            ]);

            // Redirect or perform other actions after update
            return redirect()->route('station_settings_file', ['station' => $file->station_id])->with('success', 'File updated successfully');


            // Redirect or perform other actions after update
        }

        // Handle other cases or redirect back with an error message
        return redirect()->back()->with('error', 'No new file provided');
    }

    public function download($id)
    {
        // Use `withTrashed` to include trashed files
        $file = FileRelaySetting::withTrashed()->findOrFail($id);
        $filePath = storage_path('app/public/' . $file->path);
        return response()->download($filePath, $file->filename);
    }
    public function viewFile($id)
    {
        $file = FileRelaySetting::findOrFail($id);
        $filePath = storage_path('app/public/' . $file->path);
        return response()->file($filePath);
    }
    public function destroy($id)
    {
        $file = FileRelaySetting::findOrFail($id);
        FileActivity::create([
            'filename' => $file->filename,
            'activity_type' => 'deleted',
            'user_id' => auth()->user()->id,
            'file_id' => $id
        ]);
        // Delete the file from storage
        // Storage::delete('app/public/' . $file->path);

        // Delete the file record from the database
        $file->delete();

        // Add any additional logic after deleting the file

        return back()->with('success', 'File deleted successfully');
    }
    public function showDeletedFiles()
    {
        $deletedFiles = FileRelaySetting::onlyTrashed()->get();
        foreach ($deletedFiles as $file) {
            $latestDeletedActivity = $file->activity()->latest()->where('activity_type', 'deleted')->first();

            if ($latestDeletedActivity) {
                // Access the information of the user who deleted the file
                $deletedBy = $latestDeletedActivity->user;

                // Access other information as needed
                $deletedFilename = $latestDeletedActivity->filename;

                // Now you have information about the last user who deleted the file
            }
        }


        return view('relaySetting.deleted_files', compact('latestDeletedActivity', 'deletedFiles'));
    }
    public function restoreDeletedFile($id)
    {
        $file = FileRelaySetting::withTrashed()->findOrFail($id);
        $file->restore();

        // return redirect()->route('deleted-files.index')->with('success', 'File restored successfully');
        return redirect()->route('station_settings_file', ['station' => $file->station_id])->with('success', 'File restored successfully');
    }
}
