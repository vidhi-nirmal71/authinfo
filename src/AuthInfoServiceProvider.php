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
            //
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
                    LoginLog::where('user_id', $event->user->id)
                        ->latest()
                        ->first()
                        ->update(['logout_time' => now()]);
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

            $this->loadMigrationsFrom(__DIR__ . '/database/migrations');

            $this->publishes([
                __DIR__ . '/database/migrations' => database_path('migrations'),
            ]);

            $this->mergeConfigFrom(
                __DIR__.'/Config/logindetails.php', 'logindetails'
            );
            
            $this->publishes([
                __DIR__.'/Config/logindetails.php' => config_path('logindetails.php'),
            ]);
        }

        // Get the user location
        function getLocationFromIp($ip) {
            $url = "http://ip-api.com/json/{$ip}";
            $response = @file_get_contents($url);
            if ($response) {
                $data = json_decode($response, true);
                return $data['city'] . ', ' . $data['country'] ?? 'Unknown';
            }
            return 'Unknown';
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