<?php

namespace frontend\models;

use core\models\Model;
use Slim\PDO;

class About extends Model
{
    public function getData()
    {
        $selectStatement = $this->pdo
            ->select()
            ->from('pages')
            ->where('alias', '=', 'about');

        $stmt = $selectStatement->execute();
        $data = $stmt->fetch();

        return $data;
    }
}