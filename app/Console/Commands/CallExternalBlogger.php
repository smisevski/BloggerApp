<?php

namespace App\Console\Commands;

use App\Services\Contracts\IBloggerService;
use App\Services\Contracts\IExternalBlogger;
use Illuminate\Console\Command;

class CallExternalBlogger extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'external-blogger:call';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Call external api to fetch blog posts';

    /**
     * Execute the console command.
     */
    public function handle(IExternalBlogger $externalBlogger, IBloggerService $bloggerService)
    {
        $posts = $externalBlogger->getPosts();
        $bloggerService->addMultiplePosts($posts);
        print_r("Successfully added posts from external API");
    }
}
