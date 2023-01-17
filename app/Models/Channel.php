<?php

namespace App\Models;

use Dcat\Admin\Traits\HasDateTimeFormatter;

use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
   use HasDateTimeFormatter;
    public $timestamps = false;
    protected $table = 'channel';

}
