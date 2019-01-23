<?php

class Database
{

    private static $instance = null;

    private $hostdb = "localhost";
    private $userdb = "root";
    private $passdb = "";
    private $namedb = "eco_products";
    public $pdo;

    private function __construct()
    {
        if (!isset($this->pdo)) {
            try {
                $link = new PDO("mysql:host=".$this->hostdb.";dbname=".$this->namedb, $this->userdb, $this->passdb);
                $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                echo "Connected successfully";
                $link->exec("SET CHARACTER SET utf8");
                $this->pdo = $link;

            } catch (PDOException $e) {
                die("Failed to connect whit Database".$e->getMessage());
            }
        }
    }

    public static function getInstance()
    {
        if(!isset(self::$instance)) {
            self::$instance = new Database();
        }

        return self::$instance;
    }

}