<?php

namespace App\Http\Controllers;

use App\Models\Station;
use Illuminate\Http\Request;

class StationController extends Controller
{
    // StationController.php

    // StationController.php

    public function index()
    {
        return $this->filterStations();
    }

    public function indexControl($control)
    {
        // Define a mapping of valid control center names to their canonical forms.
        $controlMapping = [
            'JAHRA CONTROL CENTER' => 'JAHRA CONTROL CENTER',
            'SHUAIBA CONTROL CENTER' => 'SHUAIBA CONTROL CENTER',
            'NATIONAL CONTROL CENTER' => 'NATIONAL CONTROL CENTER',
            'TOWN CONTROL CENTER' => 'TOWN CONTROL CENTER',
            'JABRIYA CONTROL CENTER' => 'JABRIYA CONTROL CENTER',
        ];

        // Check if the provided control center name exists in the mapping.
        if (!isset($controlMapping[$control])) {
            // If not found, return a 404 response.
            abort(404);
        }

        // Call the filterStations method with the canonical control center name.
        return $this->filterStations($controlMapping[$control]);
    }

    // This private method filters stations based on the provided control center name (or null).
    private function filterStations($control = null)
    {
        // Create a query to fetch stations from the database.
        $query = Station::query();

        // If a control center name is provided, add a WHERE clause to filter by control.
        if ($control !== null) {
            $query->where('control', $control);
        }

        // Retrieve the stations based on the query and paginate the results (15 records per page).
        $stations = $query->paginate(15);

        // Return the stations to the view, passing them in a 'stations' variable.
        return view('dashboard.stations.index', compact('stations'));
    }
}
