<?php

namespace App\Models;

use App\Models\Branch;
use App\Models\Company;
use App\Models\Country;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Company extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function getRouteKeyName()
    {
    	return 'url';
    }

    public function countries()
    {
    	return $this->belongsToMany(Country::class, 'assigned_companies');
    }

    public function states()
    {
    	return $this->belongsToMany(State::class, 'assigned_companies');
    }

    public function branches()
    {
        return $this->belongsToMany(Branch::class, 'assigned_companies');
    }

    public function employee()
    {
        return $this->hasMany(Company::class);
    }
}
