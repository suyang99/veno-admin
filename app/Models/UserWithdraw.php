<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class UserWithdraw extends Model
{
	use HasDateTimeFormatter;
    protected $table = 'user_withdraw';


    public function user(){
        return $this->belongsTo(User::class);
    }

    public function bank(){
        return $this->belongsTo(UserBank::class);
    }
    public function account(){
        return $this->belongsTo(UserAccount::class,'user_id');
    }
}
