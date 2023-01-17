<?php


namespace App\Models;


use Dcat\Admin\Traits\HasDateTimeFormatter;
use Illuminate\Database\Eloquent\Model;

class UserAccount  extends Model
{
    use HasDateTimeFormatter;
    protected $table = 'user_account';
}
