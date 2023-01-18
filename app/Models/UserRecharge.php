<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class UserRecharge extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'user_recharge';
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

    public function channel(){
       return  $this->belongsTo(Channel::class,'channel');
    }
}
