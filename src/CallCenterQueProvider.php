<?php

namespace PPF\Ques;

use Illuminate\Support\ServiceProvider;

class CallCenterQueProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        // Include the package classmap autoloader
        if (\File::exists(__DIR__.'/../vendor/autoload.php'))
        {
            include __DIR__.'/../vendor/autoload.php';
        }

        /**
        * Routes
        */
        
        // Method 1
        // A simple include, but in the routes files, controllers should be called by their namespace
        // include __DIR__.'/routes/web.php';
        
        // Method 2
        // A Better method, extend the app routes by adding a group with a specified namespace

        $this->app->router->group(['namespace' => 'PPF\Ques\App\Http\Controllers'],
            function(){
                require __DIR__.'/routes/web.php';
            }
        );

        /**
        * Views
        * use: view('PackageName::view_name');
        */
        $this->loadViewsFrom(__DIR__.'/resources/views/ques', 'PPF\Ques');

        /*
        * php artisan vendor:publish
        * Existing files will not be published
        */

        // Publish views to resources/views/vendor/vendor-name/package-name
        $this->publishes(
            [
                __DIR__.'/resources/views/ques' => base_path('resources/views/Ques'),
            ]
        );

        // Publish assets to public/vendor/vendor-name/package-name
        $this->publishes([
            __DIR__.'/public' => public_path('vendor/PPF/Ques'),
        ], 'public');

        // Publish configurations to config/vendor/vendor-name/package-name
        // Config::get('vendor.yk.laravel-package-example')
        $this->publishes([
            __DIR__.'/config' => config_path('vendor/PPF/Ques'),
        ]);

        $kernel = $this->app['Illuminate\Contracts\Http\Kernel'];
        //$kernel->pushMiddleware('Yk\LaravelPackageExample\App\Http\Middleware\MiddlewareExample');

        /**
         * Register migrations, so they will be automatically run when the php artisan migrate command is executed.
         */
        $this->loadMigrationsFrom(__DIR__.'/database/migrations');

        /**
         * Register commands, so you may execute them using the Artisan CLI.
         */
        if ($this->app->runningInConsole()) {
            $this->commands([
                \PPF\Ques\App\Console\Commands\Hello::class,
            ]);
        }

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        /**
        * Merge configurations
        * Config::get('packages.Yk.LaravelPackageExample')
        */
        $this->mergeConfigFrom(
            __DIR__.'/config/app.php', 'packages.PPF.Ques.app'
        );

        $this->app->bind('ClassExample', function(){
            return $this->app->make('PPF\Ques\Classes\ClassExample');
        });

    }
}
