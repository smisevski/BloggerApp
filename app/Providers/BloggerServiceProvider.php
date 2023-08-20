<?php

namespace App\Providers;

use App\Repositories\Contracts\IPostRepository;
use App\Repositories\Contracts\IUserRepository;
use App\Repositories\Implementation\PostRepository;
use App\Repositories\Implementation\UserRepository;
use App\Services\Contracts\IExternalBlogger;
use App\Services\Implementations\ExternalBlogger;
use Illuminate\Support\ServiceProvider;
use App\Services\Contracts\IBloggerService;
use App\Services\Implementations\BloggerService;
class BloggerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(IUserRepository::class, UserRepository::class);
        $this->app->bind(IPostRepository::class, PostRepository::class);
        $this->app->bind(IBloggerService::class, BloggerService::class);
        $this->app->bind(IExternalBlogger::class, ExternalBlogger::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
