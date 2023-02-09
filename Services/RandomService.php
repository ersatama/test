<?php

namespace Services;

require_once 'Repositories/RandomRepository.php';

use Repositories\RandomRepository;
use Contracts\RandomContract;

class RandomService
{
    public $randomRepository;
    public function __construct()
    {
        $this->randomRepository =   new RandomRepository();
    }

    public function generate()
    {
        return $this->randomRepository->create([
            RandomContract::RANDOM  =>  rand(1000000,9999999)
        ]);
    }
}