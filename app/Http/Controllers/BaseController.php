<?php

namespace App\Http\Controllers;

use App\Services\Post\PostService;

class BaseController extends Controller
{
    public $service;

    public function __construct(PostService $service)
    {
        $this->service = $service;
    }
}
