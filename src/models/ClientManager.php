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
    }

    function connectClient($client) {
        $clientMail = $client->getClientMail();
        $clientPassword = $client->getClientPassword();

        $query = $this->db->prepare("SELECT * INTO (CLIENT_NAME, CLIENT_SURNAME, CLIENT_MAIL, CLIENT_PASSWORD, CLIENT_ROLE, CLIENT_FIDELITY) VALUES (:clientMail, :clientPassword)");
        $query->execute([
            "clientMail" => $clientMail,
            "clientPassword" => $clientPassword
        ]);
        return $query->fetchAll(\PDO::FETCH_CLASS, Client::class);
    }

}
