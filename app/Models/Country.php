<?php

namespace App\Models;

use App\Models\Bank;
use App\Models\Company;
use App\Models\Continent;
use App\Models\Currency;
use App\Models\Employee;
use App\Models\PaymentGateway;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Country extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function continent()
    {
    	return $this->belongsTo(Continent::class);
    }

    public function getRouteKeyName()
    {
    	return 'url';
    }

    public function state()
    {
        return $this->hasMany(State::class);
    }

    public function bank()
    {
        return $this->hasMany(Bank::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public function paymentGateway()
    {
        return $this->hasMany(PaymentGateway::class);
    }

    public function currency()
    {
        return $this->hasMany(Currency::class);
    }

    public function company()
    {
        return $this->hasMany(Company::class);
    }
}