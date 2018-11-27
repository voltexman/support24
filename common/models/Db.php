<?php

namespace core\models;

use PDO;

class Db
{
    protected $config;
    protected $db;

    public function __construct()
    {
        $config = require dirname(__DIR__) . '/config/db.php';
        $opt  = array(
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => TRUE,
        );
        $dsn = 'mysql:host=' . DB_HOST . ';dbname=' . DB_NAME . ';charset=' . DB_CHAR;
        $this->db = new PDO($dsn, DB_USER, DB_PASS, $opt);
    }

    public function query($sql, $params)
    {
        $stmt = $this->getDb()->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * @return PDO
     */
    public function getDb()
    {
        return $this->db;
    }
}