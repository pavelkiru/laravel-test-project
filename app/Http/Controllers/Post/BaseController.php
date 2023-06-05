<?php


namespace App\Http\Controllers\Post;


use App\Http\Controllers\Controller;
use App\Services\Post\Service;
use \Spiritix\LadaCache\Database\LadaCacheTrait;

class BaseController extends Controller
{
    public $service;

    public function __construct(Service $service)
    {
        $this->service = $service;
    }
}
