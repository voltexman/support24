<?php

namespace frontend\models;

use core\models\Model;

class Ajax extends Model
{
    public function subscribe()
    {
        if (isset($_POST['email'])) {
            $email = trim($_POST['email']);
            $selectStatement = $this->pdo
                ->select()
                ->from('subscribers')
                ->where('email', '=', $email);

            $stmt = $selectStatement->execute();
            $inDB = $stmt->rowCount();

            if (!$inDB) {
                $insertStatement = $this->pdo
                    ->insert(array('email'))
                    ->into('subscribers')
                    ->values(array($email));

                $insertStatement->execute(false);
            }
            else {
                return true;
            }
        }
        return true;
    }
}