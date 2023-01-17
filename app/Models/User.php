<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
	use HasDateTimeFormatter;
    protected $table = 'user';
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';
    public $timestamps = true;
    protected $dateFormat = 'U';
    protected $fillable = [
        'email',
        'password'
    ];
    protected $guarded =[
        'email',
        'password',
    ];
    public function parentUser(){

    }
}
