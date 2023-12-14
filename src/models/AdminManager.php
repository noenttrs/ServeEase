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

    function modifyClient($client) {
        $clientName = $client->getClientName();
        $clientSurname = $client->getClientSurname();
        $clientMail = $client->getClientMail();
        $clientPassword = $client->getClientPassword();
        $clientRole = $client->getClientRole();
        $clientId = $client->getClientId();
        $clientFidelity = $client->getClientFidelity();

        $query = $this->db->prepare("UPDATE client SET CLIENT_NAME = :clientName, CLIENT_SURNAME = :clientSurname, CLIENT_MAIL = :clientMail, CLIENT_PASSWORD = :clientPassword, CLIENT_FIDELITY = :clientFidelity, CLIENT_ROLE = :clientRole WHERE CLIENT_ID = :clientId");
        $query->execute([
            "clientName" => $clientName,
            "clientSurname" => $clientSurname,
            "clientMail" => $clientMail,
            "clientPassword" => $clientPassword,
            "clientRole" => $clientRole,	
            "clientFidelity" => $clientFidelity,
            "clientId" => $clientId
        ]);

        return $query->fetchObject(Client::class);
    }

}
