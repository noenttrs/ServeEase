<?php
namespace ServeEase\models;

use ServeEase\models\Client;


class AdminManager {
    // Add your manager methods here

    private $db;

    function __construct() {
        $this->db = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
    }

}
