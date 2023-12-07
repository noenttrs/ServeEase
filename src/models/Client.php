<?php

namespace ServeEase\models;

class Client{
    private $clientName;
    private $clientSurname;
    private $clientMail;
    private $clientPassword;

    function __construct() {
    }

    function getClientName() {
        return $this->clientName;
    }

    function getClientSurname() {
        return $this->clientSurname;
    }

    function getClientMail() {
        return $this->clientMail;
    }

    function getClientPassword() {
        return $this->clientPassword;
    }

    function setClientName($clientName) {
        $this->clientName = $clientName;
    }

    function setClientSurname($clientSurname) {
        $this->clientSurname = $clientSurname;
    }

    function setClientMail($clientMail) {
        $this->clientMail = $clientMail;
    }

    function setClientPassword($clientPassword) {
        $this->clientPassword = $clientPassword;
    }

}