<?php
namespace ServeEase\models;

use ServeEase\models\Client;


class ClientManager {
    // Add your manager methods here

    function __construct() {

    }

    function saveClient() {
        $clientName = $_POST["clientName"];
        $clientSurname = $_POST["clientSurname"];
        $clientMail = $_POST["clientMail"];
        $clientPassword = $_POST["clientPassword"];
        $clientRetypePassword = $_POST["clientRetypePassword"];

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
