<?php

namespace App\Services\Implementations;

use App\Services\Contracts\IExternalBlogger;
use Illuminate\Support\Collection;
use GuzzleHttp\Client;

class ExternalBlogger implements IExternalBlogger
{
    private Client $client;

    public function __construct(Client $client)
    {
        $this->client = $client;
    }

    public function getPosts(): mixed
    {
        try {
            return $this->client->get('https://www.risklick.ch/api/v2/blogs/')->getBody();
        } catch (\Exception $e) {
            return $e->getCode();
        }
    }
}
