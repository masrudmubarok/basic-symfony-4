<?php
namespace App\Services;
use App\Services\MySecondService;

class MyService {

    public function __construct(MySecondService $second_service)
    {
        dump($second_service);
    }
}
