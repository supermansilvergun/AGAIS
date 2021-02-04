<?php

namespace App\Models;

use App\Models\Employee;
use App\Models\Municipality;
use App\Models\Parish;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Parish extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded = [];

    public function getRouteKeyName()
    {
    	return "url";
    }

    public function municipality()
    {
    	return $this->belongsTo(Municipality::class);
    }

    public function employee()
    {
        return $this->hasMany(Employee::class);
    }

    public static function parishes($id)
    {
        return Parish::where('municipality_id', '=', $id)->orderBy('name', 'ASC')->get();
    }
}
