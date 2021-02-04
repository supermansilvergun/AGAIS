<?php

namespace App\Http\Controllers\Financial_Entities;

use App\DataTables\BankDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\BankRequest;
use App\Models\Bank;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(BankDataTable $datatables)
    {
        return $datatables->render('auth.banks.index', [
            'banks' => new Bank
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.banks.create', [
            'bank'      => new Bank,
            'countries' => Country::orderBy('name', 'ASC')->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\BankRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BankRequest $request)
    {
        $bank = Bank::create($request->except('country_id') + ['code' => uniqueCode()]);
        $bank->countries()->attach($request->country_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bank $bank)
    {
        return view('auth.banks.show', [
            'bank' => $bank,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Bank $bank)
    {
        return view('auth.banks.edit', [
            'bank' => $bank,
            'countries' => Country::orderBy('name', 'ASC')->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\BankRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(BankRequest $request, Bank $bank)
    {
        $bank->update($request->except('country_id'));
        $bank->countries()->sync($request->country_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Bank $bank)
    {
        $bank->delete();
        $bank->countries()->detach();
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
        Bank::whereIn('id',explode(",",$ids))->delete();
        DB::table('assigned_banks')->whereIn('bank_id',explode(",",$ids))->delete();
    }
}
