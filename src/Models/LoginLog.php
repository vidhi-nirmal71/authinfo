<?php

namespace MyCompany\AuthPackage\Models;

use Illuminate\Database\Eloquent\Model;

class LoginLog extends Model {
    protected $table = 'login_logs';
    protected $fillable = ['user_id', 'login_time', 'ip_address'];
}
