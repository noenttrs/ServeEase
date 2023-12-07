<?php
namespace ServeEase\models;

use ServeEase\models\Client;


class ClientManager {
    // Add your manager methods here

    private $db;
    
    function __construct() {
        $this->db = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
    }

    function saveClient() {

        $db = new \PDO("mysql:host=localhost;dbname=servease;charset=utf8", "root", "root");
        $query = $db->prepare("INSERT INTO client (clientName, clientSurname, clientMail, clientPassword) VALUES (:clientName, :clientSurname, :clientMail, :clientPassword)");
        $query->execute([
            "clientName" => $clientName,
            "clientSurname" => $clientSurname,
            "clientMail" => $clientMail,
            "clientPassword" => $clientPassword
        ]);
    }
}
