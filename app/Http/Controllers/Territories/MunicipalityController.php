<?php

namespace App\Http\Controllers\Territories;

use App\DataTables\MunicipalityDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\MunicipalityRequest;
use App\Models\Country;
use App\Models\Municipality;
use App\Models\State;
use Illuminate\Http\Request;

class MunicipalityController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth'/*, 'roles:Root'*/]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(MunicipalityDataTable $datatables)
    {
        return $datatables->render('auth.territories.municipalities.index', [
            'municipality' => new Municipality,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.territories.municipalities.create', [
            'municipality'  => new Municipality,
            'states'        => State::orderBy('name', 'ASC')->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(MunicipalityRequest $request)
    {
        Municipality::create($request->validated() + ['code' => uniqueCode()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Municipality $municipality)
    {
        return view('auth.territories.municipalities.show', [
            'municipality'  => $municipality,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Municipality $municipality)
    {
        return view('auth.territories.municipalities.edit', [
            'municipality'  => $municipality,
            'states'        => State::orderBy('name', 'ASC')->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(MunicipalityRequest $request, Municipality $municipality)
    {
        $municipality->update($request->validated());
        return redirect()->route('municipalities.index', $municipality);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Municipality $municipality)
    {
        $municipality->delete();
    }

    /**
     * Remove the selected resources from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function purge(Request $request)
    {
        $ids = $request->ids;
        Municipality::whereIn('id',explode(",",$ids))->delete();
    }
}
