<?php

namespace App\Services\Contracts;

use Illuminate\Support\Collection;

interface IExternalBlogger
{
    public function getPosts(): mixed;
}
