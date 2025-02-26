<?php

namespace Itpathsolutions\Authinfo\Models;

use Illuminate\Database\Eloquent\Model;
/**
 * @property int $id
 * @property int|null $user_id
 * @property string|null $user_name
 * @property string|null $ip_address
 * @property string|null $user_agent
 * @property string|null $device_type
 * @property string|null $location
 * @property string|null $status
 * @property string|null $error_message
 * @property \Illuminate\Support\Carbon|null $login_time
 * @property \Illuminate\Support\Carbon|null $logout_time
 */
class LoginLog extends Model {
    protected $table = 'login_logs';
    public $timestamps = false;
    protected $fillable = [
        'user_id', 
        'user_name',
        'ip_address',
        'user_agent',
        'device_type',
        'location',
        'login_time',
        'logout_time',
        'status',
        'error_message'
    ];
}
