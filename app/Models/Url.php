<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'address',
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];

    public function status()
    {
        return $this->hasMany('App\Models\urlStatus');
    }


}
