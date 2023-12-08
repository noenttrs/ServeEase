<?php

namespace ServeEase\models;

class Client
{
    private $CLIENT_ID;
    private $CLIENT_NAME;
    private $CLIENT_SURNAME;
    private $CLIENT_MAIL;
    private $CLIENT_PASSWORD;
    private $CLIENT_ROLE;
    private $CLIENT_FIDELITY;

    function __construct()
    {
    }

    function getClientId()
    {
        return $this->CLIENT_ID;
    }

    function getClientName()
    {
        return $this->CLIENT_NAME;
    }

    function getClientSurname()
    {
        return $this->CLIENT_SURNAME;
    }

    function getClientMail()
    {
        return $this->CLIENT_MAIL;
    }

    function getClientPassword()
    {
        return $this->CLIENT_PASSWORD;
    }

    function getClientRole()
    {
        return $this->CLIENT_ROLE;
    }

    function getClientFidelity()
    {
        return $this->CLIENT_FIDELITY;
    }

    function setClientId($CLIENT_ID)
    {
        $this->CLIENT_ID = $CLIENT_ID;
    }

    function setClientName($CLIENT_NAME)
    {
        $this->CLIENT_NAME = $CLIENT_NAME;
    }

    function setClientSurname($CLIENT_SURNAME)
    {
        $this->CLIENT_SURNAME = $CLIENT_SURNAME;
    }

    function setClientMail($CLIENT_MAIL)
    {
        $this->CLIENT_MAIL = $CLIENT_MAIL;
    }

    function setClientPassword($CLIENT_PASSWORD)
    {
        $this->CLIENT_PASSWORD = $CLIENT_PASSWORD;
    }

    function setClientRole($CLIENT_ROLE)
    {
        $this->CLIENT_ROLE = $CLIENT_ROLE;
    }

    function setClientFidelity($CLIENT_FIDELITY)
    {
        $this->CLIENT_FIDELITY = $CLIENT_FIDELITY;
    }


    function setSession()
    {
        //return un object client en session
        $_SESSION["client"] = [
            "CLIENT_ID" => $this->getClientId(),
            "CLIENT_NAME" => $this->getClientName(),
            "CLIENT_SURNAME" => $this->getClientSurname(),
            "CLIENT_MAIL" => $this->getClientMail(),
            "CLIENT_ROLE" => $this->getClientRole()
        ];
    }
}
