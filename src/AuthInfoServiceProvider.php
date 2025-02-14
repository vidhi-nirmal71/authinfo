<?php
   
    namespace Itpathsolutions\Authinfo;

    use Illuminate\Auth\Events\Failed;
    use Illuminate\Support\Facades\Event;
    use Illuminate\Support\ServiceProvider;
    use Illuminate\Auth\Events\Login;
    use Illuminate\Auth\Events\Logout;
    use Itpathsolutions\Authinfo\Models\LoginLog;

    class AuthInfoServiceProvider extends ServiceProvider {
        public function register()
        {
            $this->mergeConfigFrom(
                __DIR__.'/Config/logindetails.php', 'logindetails'
            );
        }

        public function boot()
        {
            // For Login the user
            Event::listen(Login::class, function ($event) {
                if (class_exists(LoginLog::class)) {
                    LoginLog::create([
                        'user_id'     => $event->user->id,
                        'user_name'     => $event->user->name ?? null,
                        'ip_address'  => request()->ip(),
                        'user_agent'  => request()->header('User-Agent'),
                        'device_type'      => $this->getDeviceType(),
                        'location'    => $this->getLocationFromIp(request()->ip()),
                        'status'      => 'success',
                    ]);
                }
            });

            // For Logout the user
            Event::listen(Logout::class, function ($event) {
                if (class_exists(LoginLog::class)) {
                    $user = LoginLog::where('user_id', $event->user->id)->orderBy('login_time', 'desc')->first();
                    if($user){
                        $user->logout_time = now();
                        $user->save();
                    }
                }
            });

            // For Fail Login
            Event::listen(Failed::class, function ($event) {
                $errorMessage = 'Invalid login attempt.';

                if (!$event->user) {
                    $errorMessage = 'Invalid email. User not found.';
                } else {
                    $errorMessage = 'Invalid password. Incorrect credentials.';
                }

                LoginLog::create([
                    'user_id'      => optional($event->user)->id,
                    'user_name'      => optional($event->user)->name,
                    'ip_address'   => request()->ip(),
                    'user_agent'   => request()->header('User-Agent'),
                    'device_type'       => $this->getDeviceType(request()->header('User-Agent')),
                    'location'    => $this->getLocationFromIp(request()->ip()),
                    'status' => 'failed',
                    'error_message' => $errorMessage,
                ]);
            });

            $this->loadRoutesFrom(__DIR__.'/routes/web.php');

            $this->loadViewsFrom(__DIR__.'/resources/views', 'authinfo');

            $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

            $this->publishes([
                __DIR__ . '/database/migrations' => database_path('migrations'), // Migrations
                __DIR__.'/Config/logindetails.php' => config_path('logindetails.php'), // Config file
            ], 'authinfo-package');

            $this->publishes([
                __DIR__ . '/database/migrations' => database_path('migrations'),
            ], 'migrations');
        }

        // Get the user location
        function getLocationFromIp($ip) {
            if ($ip === '127.0.0.1' || filter_var($ip, FILTER_VALIDATE_IP, FILTER_FLAG_NO_PRIV_RANGE | FILTER_FLAG_NO_RES_RANGE) === false) {
                return 'Localhost or Private Network';
            }

            $url = "http://ip-api.com/json/{$ip}";
            $response = @file_get_contents($url);

            if ($response) {
                $data = json_decode($response, true);
                if (isset($data['city']) && isset($data['country'])) {
                    return "{$data['city']}, {$data['country']}";
                }
            }

            return 'Unknown Location';
        }
        

        // Get the user device
        function getDeviceType() {
            $agent = strtolower(request()->header('User-Agent'));

            if (preg_match('/Mobile|Android|iPhone|iPad|iPod/', $agent)) {
                return 'Mobile';
            } elseif (preg_match('/Tablet|iPad/', $agent)) {
                return 'Tablet';
            } else {
                return 'Desktop';
            }
        }
   }
?>