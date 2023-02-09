<?php

namespace Controllers;

require_once 'Services\RandomService.php';

use Services\RandomService;

class RandomController
{
    protected $randomService;
    public function __construct()
    {
        $this->randomService    =   new RandomService();
    }

    public function generate()
    {
        return $this->randomService->generate();
    }

    public function retrieve($id)
    {
        return $this->randomService->randomRepository->firstById($id);
    }
}