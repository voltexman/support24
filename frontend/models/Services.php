<?php

namespace frontend\models;

use core\models\Model;
use Slim\PDO;

class Services extends Model
{
    public function getServicesList()
    {
        $selectStatement = $this->pdo
            ->select(['alias', 'name'])
            ->from('services');
        $stmt = $selectStatement->execute();
        $list = $stmt->fetchAll();

        return $list;
    }

    public function getServiceData($alias)
    {
        $selectStatement = $this->pdo
            ->select()
            ->from('services')
            ->where('alias', '=', $alias);

        $stmt = $selectStatement->execute();
        $data = $stmt->fetch();

        return $data;
    }
}