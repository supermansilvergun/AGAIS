<?php

namespace App\Http\Controllers\Profiles;

use App\DataTables\EmployeeDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\EmployeeRequest;
use App\Models\Bank;
use App\Models\Company;
use App\Models\Country;
use App\Models\Document;
use App\Models\Employee;
use App\Models\Municipality;
use App\Models\Parish;
use App\Models\PaymentGateway;
use App\Models\Role;
use App\Models\State;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*public function index(EmployeeDataTable $datatables)
    {
        return $datatables->render('auth.employees.index', [
            'employee' => new Employee,
        ]);
    }*/
    public function index()
    {
        return view('auth.employees.index', [
            'employees' => Employee::orderBy('created_at', 'DESC')->with(['country','state','municipality','parish','roles', 'document'])->paginate(9),
            'employee' => new Employee,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.employees.create', [
            'employee'          => new Employee,
            'countries'         => Country::orderBy('name', 'ASC')->pluck('name', 'id'),
            'states'            => State::orderBy('name', 'ASC')->pluck('name', 'id'),
            'municipalities'    => Municipality::orderBy('name', 'ASC')->pluck('name', 'id'),
            'parishes'          => Parish::orderBy('name', 'ASC')->pluck('name', 'id'),
            'roles'             => Role::orderBy('name', 'ASC')->pluck('name', 'id'),
            'documents'         => Document::orderBy('name', 'ASC')->pluck('acronym', 'id'),
            'banks'             => Bank::orderBy('name', 'ASC')->pluck('name', 'id'),
            'payment_gateways'  => PaymentGateway::orderBy('name', 'ASC')->pluck('name', 'id'),
            'companies'         => Company::orderBy('name', 'ASC')->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(EmployeeRequest $request)
    {
        $employee = Employee::create($request->except(
            ['role_id', 'bank_id', 'payment_gateway_id']) + 
            ['code' => uniqueCode()]);

        if ($request->hasFile('avatar')) {
            $employee->avatar = $request->file('avatar')->store('avatars');
        }
        $employee->roles()->attach($request->role_id);
        $employee->banks()->attach($request->bank_id);
        $employee->paymentGateways()->attach($request->payment_gateway_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        return view('auth.employees.show',[
            'employee' => $employee,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('auth.employees.edit', [
            'employee'          => $employee,
            'countries'         => Country::orderBy('name', 'ASC')->pluck('name', 'id'),
            'states'            => State::orderBy('name', 'ASC')->pluck('name', 'id'),
            'municipalities'    => Municipality::orderBy('name', 'ASC')->pluck('name', 'id'),
            'parishes'          => Parish::orderBy('name', 'ASC')->pluck('name', 'id'),
            'roles'             => Role::orderBy('name', 'ASC')->pluck('name', 'id'),
            'documents'         => Document::orderBy('name', 'ASC')->pluck('acronym', 'id'),
            'banks'             => Bank::orderBy('name', 'ASC')->pluck('name', 'id'),
            'payment_gateways'  => PaymentGateway::orderBy('name', 'ASC')->pluck('name', 'id'),
            'companies'         => Company::orderBy('name', 'ASC')->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EmployeeRequest $request, Employee $employee)
    {
        $employee->update($request->except(
            ['role_id', 'bank_id', 'payment_gateway_id']) + 
            ['code' => uniqueCode()]);

        if ($request->hasFile('avatar')) {
            $employee->avatar = $request->file('avatar')->store('avatars');
        }
        $employee->roles()->sync($request->role_id);
        $employee->banks()->sync($request->bank_id);
        $employee->paymentGateways()->sync($request->payment_gateway_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->delete();
        $employee->roles()->detach();
        $employee->banks()->detach();
        $employee->paymentGateways()->detach();
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
        Employee::whereIn('id',explode(",",$ids))->delete();
    }
}
