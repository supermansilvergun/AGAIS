<?php

namespace App\Models;

use App\Models\Company;
use App\Models\Country;
use App\Models\Employee;
use App\Models\Municipality;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class State extends Model
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

    public function municipality()
    {
        return $this->hasMany(Municipality::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public static function states($id)
    {
        return State::where('country_id', '=', $id)->orderBy('name', 'ASC')->get();
    }

    public function company()
    {
        return $this->hasMany(Company::class);
    }
}
