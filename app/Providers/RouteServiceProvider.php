<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/home';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapSuperAdminRoutes();

        $this->mapBusRoutes();

        $this->mapPlaneRoutes();

        $this->mapTrainRoutes();

        $this->mapLaunchRoutes();

        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
            ->group(base_path('routes/web.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
            ->middleware('api')
            ->namespace($this->namespace)
            ->group(base_path('routes/api.php'));
    }
    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapSuperAdminRoutes()
    {
        Route::prefix('super-admin')
        ->middleware('web')
        
            ->name('superAdmin.')
            ->namespace($this->namespace)
            ->group(base_path('routes/superAdmin.php'));
    }
    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapBusRoutes()
    {
        Route::prefix('bus')
        ->middleware('web')
        
            ->name('bus.')
            ->namespace($this->namespace)
            ->group(base_path('routes/bus.php'));
    }
    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapTrainRoutes()
    {
        Route::prefix('train')
        ->middleware('web')
        
            ->name('train.')
            ->namespace($this->namespace)
            ->group(base_path('routes/train.php'));
    }
    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapPlaneRoutes()
    {
        Route::prefix('plane')
        ->middleware('web')
        
            ->name('plane.')
            ->namespace($this->namespace)
            ->group(base_path('routes/plane.php'));
    }
    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapLaunchRoutes()
    {
        Route::prefix('launch')
        ->middleware('web')
        
            ->name('launch.')
            ->namespace($this->namespace)
            ->group(base_path('routes/launch.php'));
    }
}
