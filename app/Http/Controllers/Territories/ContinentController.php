<?php

namespace App\Http\Controllers\Territories;

use App\DataTables\ContinentDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ContinentRequest;
use App\Models\Continent;
use Illuminate\Http\Request;

class ContinentController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(ContinentDataTable $datatable)
    {
        return $datatable->render('auth.territories.continents.index', [
            'continent' => new Continent
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.territories.continents.create', [
            'continent' => new Continent,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ContinentRequest $request)
    {
        Continent::create($request->validated() + ['code' => uniqueCode()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Continent $continent)
    {
        return view('auth.territories.continents.show', [
            'continent' => $continent
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Continent $continent)
    {
        return view('auth.territories.continents.edit',[
            'continent' => $continent,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ContinentRequest $request, Continent $continent)
    {
        $continent->update($request->validated());
        return redirect()->route('continents.index', $continent);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Continent $continent)
    {
        $continent->delete();
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
        Continent::whereIn('id',explode(",",$ids))->delete();
    }
}
