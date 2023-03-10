<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class State extends Model
{
    use HasFactory;
    protected $table = "states";
    protected $primaryKey = "id";

    protected $fillable = [
        'name',
        'code_name',
        'tax',
    ];

    protected $casts = [
        'country_id'    => 'integer',
    ];

    public function country()
    {
        return $this->belongsTo(Country::class, 'country_id','id');
    }

	public function cities()
    {
        return $this->hasMany(City::class, 'country_id','id');
    }

    public function customer(){
        return $this->belongsTo('App\Models\Customer', 'rest_state_id');
    }

    public function companyLocation(){
        return $this->belongsTo(CompanyLocation::class, 'state_id', 'id');
    }


}
