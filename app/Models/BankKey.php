<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class BankKey extends Model
{
    protected $fillable = [
        'client_id',
        'keyBank341',
        'companyCode341',
    ];

    public function clients (){
        return $this->belongsTo(Client::class);
    }
}
