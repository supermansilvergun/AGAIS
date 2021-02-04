<?php

namespace App\Http\Controllers\Dynamic_Dropdowns;

use App\Http\Controllers\Controller;
use App\Models\Municipality;
use App\Models\Parish;
use App\Models\State;
use Illuminate\Http\Request;

class DynamicDropdownController extends Controller
{
    public function getStates(Request $request, $id)
    {
        if ($request->ajax()) {
            $states = State::states($id);
            return response()->json($states);
        }
    }

    public function getMunicipalities(Request $request, $id)
    {
        if ($request->ajax()) {
            $municipalities = Municipality::municipalities($id);
            return response()->json($municipalities);
        }
    }

    public function getParishes(Request $request, $id)
    {
        if ($request->ajax()) {
            $parishes = Parish::parishes($id);
            return response()->json($parishes);
        }
    }
}
