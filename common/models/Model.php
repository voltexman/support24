<?php

namespace core\models;

use Slim\PDO;

class Model
{
    protected $pdo;

    public function __construct()
    {
        $db = require './common/config/db.php';
        $this->pdo = new PDO\Database($db['dsn'], $db['usr'], $db['pwd']);
    }
}