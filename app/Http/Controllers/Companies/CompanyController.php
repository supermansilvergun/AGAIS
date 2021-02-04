<?php

namespace App\Http\Controllers\Companies;

use App\DataTables\CompanyDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\CompanyRequest;
use App\Models\Branch;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(CompanyDataTable $datatables)
    {
        return $datatables->render('auth.companies.index', [
            'company' => new Company,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.companies.create', [
            'company'   => new Company,
            'countries' => Country::orderBy('name', 'ASC')->pluck('name', 'id'),
            'states'    => State::orderBy('name', 'ASC')->pluck('name', 'id'),
            'branches'  => Branch::orderBy('name', 'ASC')->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $company = Company::create($request->except(['country_id', 'state_id', 'branch_id']) + ['code' => uniqueCode()]);
        $company->countries()->attach($request->country_id);
        $company->states()->attach($request->state_id);
        $company->branches()->attach($request->branch_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Company $company)
    {
        return view('auth.companies.show', [
            'company' => $company,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        return view('auth.companies.edit', [
            'company'   => $company,
            'countries' => Country::orderBy('name', 'ASC')->pluck('name', 'id'),
            'states'    => State::orderBy('name', 'ASC')->pluck('name', 'id'),
            'branches'  => Branch::orderBy('name', 'ASC')->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
        $company->update($request->except(['country_id', 'state_id', 'branch_id']));
        $company->countries()->sync($request->country_id);
        $company->states()->sync($request->state_id);
        $company->branches()->sync($request->branch_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Company $company)
    {
        $company->delete();
        $company->countries()->detach();
        $company->states()->detach();
        $company->branches()->detach();
    }

    /**
     * Remove the selected resources from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function purge(CompanyRequest $request)
    {
        $ids = $request->ids;
        Company::whereIn('id',explode(",",$ids))->delete();
        DB::table('assigned_companies')->whereIn('employee_id',explode(",",$ids))->delete();
    }
}
