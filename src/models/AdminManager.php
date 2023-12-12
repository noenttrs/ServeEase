<?php
namespace ServeEase\models;

use ServeEase\models\Client;


class AdminManager {
    // Add your manager methods here

    private $db;

    function __construct() {
        $this->db = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
    }

    function searchClient($clientMail) {
        $query = $this->db->prepare("SELECT * FROM client WHERE CLIENT_MAIL = :clientMail");
        $query->execute([
            "clientMail" => $clientMail
        ]);
        return $query->fetchObject(Client::class);
    }

}
