<?php
namespace App;

use \PDO;
require_once 'db.php';
class Connection
{
    private $pdoConnection;

    public function __construct()
    {
        try {
            $this->pdoConnection = new PDO(
                'mysql:host='.APP_DB_HOST.'; dbname='.APP_DB_NAME.'; charset=utf8',
                APP_DB_USER,
                APP_DB_PWD
            );

            $this->pdoConnection->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_CLASS);



        } catch (\PDOException $e) {
            die('<div class="error">Error !: '.$e->getMessage().'</div>');
        }
    }

    public function getPdoConnection() :PDO
    {
        return $this->pdoConnection;
    }

}
