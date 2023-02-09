<?php

namespace Repositories;

require_once 'Models/Random.php';

use Models\Random;

class RandomRepository
{
    protected $model;
    public function __construct()
    {
        $this->model    =   new Random();
    }

    public function create($data)
    {
        return $this->model->create($data);
    }

    public function firstById($id)
    {
        return $this->model->firstById($id);
    }
}