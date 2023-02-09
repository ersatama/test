<?php

namespace Database;

use Contracts\RandomContract;
use mysqli;

class database
{
    private $db;
    public function __construct()
    {
        $this->db = new mysqli("localhost","root","","test");
        if ($this->db->connect_errno) {
            exit("Failed to connect to MySQL: " . $this->db -> connect_error);
        }
    }

    public function __destruct()
    {
        $this->db->close();
    }

    public function create(string $table, array $data)
    {
        $fields =   [RandomContract::ID];
        $values =   [NULL];
        foreach ($data as $key => $value) {
            $fields[]   =   $key;
            $values[]   =   $value;
        }
        $this->db->query('INSERT INTO `'.$table.'` ('.implode(',', $fields).') VALUES (null'.implode(',', $values).')');
        return $this->firstById($table, $this->db->insert_id);
    }

    public function firstById(string $table,int $id)
    {
        $query  =   $this->db->query('SELECT * FROM '.$table.' WHERE id='.$id.' LIMIT 1');
        return mysqli_fetch_assoc($query);
    }
}