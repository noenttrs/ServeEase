<?php
namespace ServeEase\models;

use ServeEase\models\Client;


class ClientManager {
    // Add your manager methods here

    private $db;

    function __construct() {
        $this->db = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
    }

    function saveClient($client) {
        $clientName = $client->getClientName();
        $clientSurname = $client->getClientSurname();
        $clientMail = $client->getClientMail();
        $clientPassword = $client->getClientPassword();
        $query = $this->db->prepare("INSERT INTO client (CLIENT_NAME, CLIENT_SURNAME, CLIENT_MAIL, CLIENT_PASSWORD, CLIENT_ROLE, CLIENT_FIDELITY) VALUES (:clientName, :clientSurname, :clientMail, :clientPassword, :clientRole, :clientFidelity)");
        $query->execute([
            "clientName" => $clientName,
            "clientSurname" => $clientSurname,
            "clientMail" => $clientMail,
            "clientPassword" => $clientPassword,
            "clientRole" => 0,
            "clientFidelity" => 20
        ]);
        return $query->fetchAll(\PDO::FETCH_CLASS, Client::class);
    }

    function verifyClientMail($clientMail) {
        $query = $this->db->prepare("SELECT * FROM client WHERE CLIENT_MAIL = :clientMail");
        $query->execute([
            "clientMail" => $clientMail
        ]);
        return $query->fetchObject(Client::class);
    }

    function connectClient($clientMail, $clientPassword) {
        $getAccount = $this->verifyClientMail($clientMail);
        if($getAccount && password_verify($clientPassword, $getAccount->getClientPassword())) return $getAccount;
        else return false;
    }

}
