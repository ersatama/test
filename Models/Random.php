<?php
namespace Models;

require_once 'Contracts/RandomContract.php';

use Contracts\RandomContract;

class Random
{
    const TABLE =   RandomContract::TABLE;
    protected $db;
    public function __construct()
    {
        global $db;
        $this->db   =   $db;
    }

    public function create($data)
    {
        return $this->db->create(self::TABLE, $data);
    }

    public function firstById($id)
    {
        return $this->db->firstById(self::TABLE, $id);
    }
}