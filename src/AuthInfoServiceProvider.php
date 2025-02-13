<?php
   
    namespace Itpathsolutions\Authinfo;
    use Illuminate\Support\Facades\Event;
    use Illuminate\Support\ServiceProvider;
    use Illuminate\Auth\Events\Login;
    use Illuminate\Support\Facades\Request;
    use Itpathsolutions\Authinfo\Models\LoginLog;

    class AuthInfoServiceProvider extends ServiceProvider {
        public function register()
        {
            //
        }

        public function boot()
        {
            Event::listen(Login::class, function ($event) {
                if (class_exists(LoginLog::class)) {
                    LoginLog::create([
                        'user_id' => $event->user->id,
                        'ip_address' => Request::ip(),
                    ]);
                }
            });

            $this->mergeConfigFrom(
                __DIR__.'/config/logindetails.php', 'logindetails'
            );
            
            $this->publishes([
                __DIR__.'/config/logindetails.php' => config_path('logindetails.php'),
            ]);  
        }
   }
?>