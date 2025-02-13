<?php

namespace Itpathsolutions\Authinfo\Models;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model {
    protected $table = 'login_logs';
    public $timestamps = false;
    protected $fillable = ['user_id', 'login_time', 'ip_address'];
}
