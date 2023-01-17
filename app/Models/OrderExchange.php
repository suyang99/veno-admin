<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class OrderExchange extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'order_exchange';

    public function user()
    {
        //return $this->hasOne(User::class,'user_id');
        return $this->belongsTo(User::class);
    }
}
