<?php

namespace App\Http\Controllers;

use App\Models\TaskAttachment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    public function download($main_task_id, $file)
    {
       
        // Define the file path
        $filePath = storage_path('app/public/attachments/' . $main_task_id . '/' . $file);

        // Check if the file exists
        if (file_exists($filePath)) {
            // Generate a response to download the file
            return response()->download($filePath, $file);
        } else {
            // File not found, return a 404 response
            abort(404);
        }
    }
    public function view($main_task_id, $file)
    {
         $filePath = storage_path('app/public/attachments/' . $main_task_id . '/' . $file);

        if (file_exists($filePath)) {
            return response()->file($filePath);
        } else {
            abort(404);
        }
    }


    public function delete($main_task_id, $file,$id)
    {
        // Define the file path
        $filePath = storage_path('app/public/attachments/' . $main_task_id . '/' . $file);
        // Check if the file exists
        if (file_exists($filePath)) {
            // Delete the file
            Storage::delete('public/attachments/' . $main_task_id . '/' . $file);
            // Delete the corresponding record from the database
            TaskAttachment::findOrFail($id)
                ->delete();
            // Optionally, you can also delete any database records associated with the file here
            // Redirect back to the previous page with a success message
            return back()->with('success', 'File deleted successfully.');
        } else {
            // File not found, return a 404 response
            abort(404);
        }
    }
}