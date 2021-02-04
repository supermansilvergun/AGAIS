<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Municipality;
use App\Models\Parish;
use App\Models\State;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Municipality extends Model
{
    use HasFactory, SoftDeletes;
    protected $guarded = [];

    public function getRouteKeyName()
    {
    	return 'url';
    }

    public function state()
    {
    	return $this->belongsTo(State::class);
    }

    public function parish()
    {
        return hasMany(Parish::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public static function municipalities($id)
    {
        return Municipality::where('state_id', '=', $id)->orderBy('name', 'ASC')->get();
    }
}
