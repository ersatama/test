<?php
use Database\database;
use Routes\api;

require_once 'Database/database.php';
require_once 'Routes/api.php';

$db =   new database();
new api();
