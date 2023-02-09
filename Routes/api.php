<?php

namespace Routes;

require_once 'Controllers/RandomController.php';

use Controllers\RandomController;

class api
{
    protected $randomController;
    public function __construct()
    {
        $this->randomController =   new RandomController();
        $this->checkRoutePath();
    }

    public function checkRoutePath()
    {
        $parsed_url     =   explode("?", $_SERVER['REQUEST_URI']);
        $current_url    =   explode('/',$parsed_url[0]);

        if ($current_url[1] === '/generate' || $current_url[1] === 'generate') {


            $this->generate();

        } else if ($current_url[1] === '/retrieve' || $current_url[1] === 'retrieve') {

            if (array_key_exists(2, $current_url)) {
                $this->retrieve((int) $current_url[2]);

            }

        } else {
            echo '/generate - generate random number<br>';
            echo '/retrieve/{id} - retrieve data by id';
        }
    }

    public function generate()
    {
        header("Content-Type: application/json");
        echo json_encode($this->randomController->generate());
    }

    public function retrieve($id)
    {
        header("Content-Type: application/json");
        if ($random = $this->randomController->retrieve($id)) {
            echo json_encode($random);
        }
        http_response_code(404);
        echo json_encode([
           'message'    =>  'not found'
        ]);
    }
}