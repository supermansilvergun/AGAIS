<?php

namespace App\Http\Controllers\Territories;

use App\DataTables\ParishDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\ParishRequest;
use App\Models\Municipality;
use App\Models\Parish;
use Illuminate\Http\Request;

class ParishController extends Controller
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
    public function index(ParishDataTable $datatables)
    {
        return $datatables->render('auth.territories.parishes.index', [
            'parish' => new Parish,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.territories.parishes.create', [
            'parish'         => new Parish,
            'municipalities' => Municipality::orderBy('name', 'ASC')->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ParishRequest $request)
    {
        Parish::create($request->validated() + ['code' => uniqueCode()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Parish $parish)
    {
        return view('auth.territories.parishes.show', [
        	'parish' => $parish
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Parish $parish)
    {
        return view('auth.territories.parishes.edit', [
        	'parish' 		 => $parish,
        	'municipalities' => Municipality::orderBy('name', 'ASC')->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(ParishRequest $request, Parish $parish)
    {
        $parish->update($request->validated());
        return redirect()->route('parishes.index', $parish);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Parish $parish)
    {
        $parish->delete();
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
        Parish::whereIn('id',explode(",",$ids))->delete();
    }
}
