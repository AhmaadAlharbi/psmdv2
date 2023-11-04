<?php

namespace App\Http\Controllers;

use App\Models\MainAlarm;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MainAlarmController extends Controller
{
    public function index()
    {
        $department_id = Auth::user()->department_id;
        $mainAlarms = MainAlarm::where('department_id', $department_id)->get();
        return view('dashboard.main_alarms.index', compact('mainAlarms'));
    }
    public function store(Request $request)
    {
        // Validate the request data (adjust the validation rules as needed)
        $request->validate([
            'name' => 'required|string|max:255',
        ]);
        // Create a new MainAlarm model and fill it with the request data
        MainAlarm::create([
            'name' => $request->input('name'),
            'department_id' => Auth::user()->department_id,
            // Add more attributes to create as needed
        ]);

        // Store a success message in the session
        session()->flash('success', 'Alarm created successfully');

        // Redirect back to the previous page or any other desired page
        return back();
    }


    public function update(Request $request, $id)
    {
        try {
            // Find the MainAlarm model by ID
            $mainAlarm = MainAlarm::findOrFail($id);
            // Get the updated data from the request
            $updatedData = $request->input('alarm_name');

            // Update the model's attributes
            $mainAlarm->update([
                'name' => $updatedData
                // Add more attributes to update as needed
            ]);

            session()->flash('success', 'Data updated successfully');
            return back();
        } catch (\Exception $e) {
            // Handle any errors that occur during the update
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
    public function destroy($id)
    {
        try {
            // Find the MainAlarm model by ID
            $mainAlarm = MainAlarm::findOrFail($id);
            // Delete the model
            $mainAlarm->delete();
            // Store a success message in the session
            session()->flash('success', 'Alarm deleted successfully');
            // Redirect back to the previous page
            return back();
        } catch (\Exception $e) {
            // Handle any errors that occur during the deletion
            return response()->json(['success' => false, 'error' => $e->getMessage()]);
        }
    }
}
