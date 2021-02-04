<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Company;
use App\Models\Country;
use App\Models\Document;
use App\Models\Municipality;
use App\Models\Parish;
use App\Models\PaymentGateway;
use App\Models\Role;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Employee extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'url';
    }

    public function country()
    {
    	return $this->belongsTo(Country::class);
    }

    public function state()
    {
    	return $this->belongsTo(State::class);
    }

    public function municipality()
    {
    	return $this->belongsTo(Municipality::class);
    }

    public function parish()
    {
    	return $this->belongsTo(Parish::class);
    }

    public function roles()
    {
        return $this->belongsToMany(Role::class, 'assigned_roles', 'employee_id', 'role_id');
    }

    public function document()
    {
        return $this->belongsTo(Document::class);
    }

    public function banks()
    {
        return $this->belongsToMany(Bank::class, 'assigned_payment_mothod');
    }

    public function company()
    {
        return $this->belongsTo(Company::class);
    }

    public function paymentGateways()
    {
        return $this->belongsToMany(PaymentGateway::class, 'assigned_payment_mothod');
    }
}
