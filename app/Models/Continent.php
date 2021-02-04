<?php

namespace App\Models;

use App\Models\Continent;
use App\Models\Country;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Continent extends Model
{
    use HasFactory, SoftDeletes;

    protected $guarded	=	[];

    public function country()
    {
        return $this->hasMany(Country::class);
    }

    public function getRouteKeyName()
    {
    	return 'url';
    }
}
