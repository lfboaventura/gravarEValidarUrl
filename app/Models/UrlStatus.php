<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UrlStatus extends Model
{
    protected $fillable = [
        'status', 'data', 'url_id'
    ];

    protected $dates = [
        'created_at', 'updated_at',
    ];

    public function url()
    {
        return $this->belongsTo('App\Models\Url');
    }

}
