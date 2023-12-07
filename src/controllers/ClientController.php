<?php

namespace ServeEase\controllers;

use ServeEase\models\ClientManager;
use ServeEase\models\Client;
class ClientController {
    function __construct() {

    }

    function showSignup() {
        require VIEWS . "gateway/signup.php";
    }

    function signup() {

        if($_POST["clientPassword"] != $_POST["clientRetypePassword"]) {
            echo "Les mots de passe ne correspondent pas";
            return;
        }
        $client = new Client();
        $client->setClientName($_POST["clientName"]);
        $client->setClientSurname($_POST["clientSurname"]);
        $client->setClientMail($_POST["clientMail"]);
        $client->setClientPassword($_POST["clientPassword"]);
        $client->setClientRole(0);
        $client->setClientFidelity(20);

        $clientManager = new ClientManager();
        $clientManager->saveClient($client);

        
        

    }
}
?>