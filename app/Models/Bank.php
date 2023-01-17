<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;

class Bank extends Model
{
	use HasDateTimeFormatter;
    use SoftDeletes;
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamps = true;
    protected $table = 'bank';
    protected $dateFormat = 'U';
    public function user(){
        return $this->belongsTo(User::class,'user_id');
    }

}
