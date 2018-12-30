<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'cost_per_kg'
    ];

    public function laundries()
    {
        return $this->hasMany('App\Laundry');
    }
}
