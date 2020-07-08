<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionOut extends Model
{
    protected $fillable = [
    	'user_id', 'title', 'description', 'money', 'datetime'
    ];
}
