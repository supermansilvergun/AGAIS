<?php

namespace App\Http\Controllers;

use App\Models\Continent;
use Illuminate\Http\Request;

class RecoverController extends Controller
{
    public function restore($id)
    {
    	Continent::onlyTrashed()->Where('id', $id)->restore();
    }
}
