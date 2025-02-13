<?php

namespace Itpathsolutions\Authinfo\Models;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model {
    protected $table = 'login_logs';
    public $timestamps = false;
    protected $fillable = ['user_id', 'user_name', 'ip_address', 'user_agent', 'device_type', 'location', 'login_time', 'logout_time', 'status', 'error_message'];
}
