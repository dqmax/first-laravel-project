<?php

namespace App\Providers;

use App\Models\Post;
use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Paginator::useBootstrap();
        VerifyCsrfToken::except(['/posts']);
        VerifyCsrfToken::except(['/posts/*']);

        View::composer('*', function ($view) {
            $view->with('count', Post::count());
        });
    }
}
