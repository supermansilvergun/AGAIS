<?php

namespace App\Http\Controllers\Financial_Entities;

use App\DataTables\PaymentGatewayDataTable;
use App\Http\Controllers\Controller;
use App\Http\Requests\PaymentGatewayRequest;
use App\Models\Country;
use App\Models\PaymentGateway;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PaymentGatewayController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(PaymentGatewayDataTable $datatables)
    {
        return $datatables->render('auth.payment-gateways.index', [
            'payment_gateway' => new PaymentGateway,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('auth.payment-gateways.create', [
            'payment_gateway' => new PaymentGateway,
            'countries'       => Country::orderBy('name', 'ASC')->pluck('name', 'id'),
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PaymentGatewayRequest $request)
    {
        $payment_gateway = PaymentGateway::create($request->except('country_id') + ['code' => uniqueCode()]);
        $payment_gateway->countries()->attach($request->country_id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentGateway $payment_gateway)
    {
        return view('auth.payment-gateways.show', [
            'payment_gateway' => $payment_gateway,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentGateway $payment_gateway)
    {
        return view('auth.payment-gateways.edit', [
            'payment_gateway' => $payment_gateway,
            'countries'       => Country::orderBy('name', 'ASC')->pluck('name', 'id'),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PaymentGatewayRequest $request, PaymentGateway $payment_gateway)
    {
        $payment_gateway->update($request->except('country_id'));
        $payment_gateway->countries()->sync($request->country_id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(PaymentGateway $payment_gateway)
    {
        $payment_gateway->delete();
        $payment_gateway->countries()->detach();
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
        PaymentGateway::whereIn('id',explode(",",$ids))->delete();
        DB::table('assigned_banks')->whereIn('payment_getway_id',explode(",",$ids))->delete();
    }
}
