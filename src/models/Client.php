<?php

namespace ServeEase\models;

class Client{
    private $CLIENT_NAME;
    private $CLIENT_SURNAME;
    private $CLIENT_MAIL;
    private $CLIENT_PASSWORD;

    function __construct() {
    }

    function getClientName() {
        return $this->CLIENT_NAME;
    }

    function getClientSurname() {
        return $this->CLIENT_SURNAME;
    }

    function getClientMail() {
        return $this->CLIENT_MAIL;
    }

    function getClientPassword() {
        return $this->CLIENT_PASSWORD;
    }

    function setClientName($CLIENT_NAME) {
        $this->CLIENT_NAME = $CLIENT_NAME;
    }

    function setClientSurname($CLIENT_SURNAME) {
        $this->CLIENT_SURNAME = $CLIENT_SURNAME;
    }

    function setClientMail($CLIENT_MAIL) {
        $this->CLIENT_MAIL = $CLIENT_MAIL;
    }

    function setClientPassword($CLIENT_PASSWORD) {
        $this->CLIENT_PASSWORD = $CLIENT_PASSWORD;
    }

}