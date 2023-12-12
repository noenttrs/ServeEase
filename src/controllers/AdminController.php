<?php

namespace ServeEase\controllers;

use ServeEase\models\AdminManager;

class AdminController
{

    private $adminManager;

    function __construct()
    {
        $this->adminManager = new AdminManager();
    }

    function showAdmin()
    {
        require VIEWS . "admin/home.php";
    }

    function searchClient()
    {
        if($_SESSION['client']['CLIENT_ROLE'] !== 1){
            header("Location: /");
            return;
        }


        $client = $this->adminManager->searchClient($_POST["clientSearch"]);

        if(!$client){
            $error = "Aucun client trouvé";
            require VIEWS . "admin/home.php";
            return;
        }

        require VIEWS . "admin/searchClient.php";
    }

    public function index()
    {
        // TODO: Implement index method
    }

    public function create()
    {
        // TODO: Implement create method
    }

    public function store()
    {
        // TODO: Implement store method
    }

    public function edit($id)
    {
        // TODO: Implement edit method
    }

    public function update($id)
    {
        // TODO: Implement update method
    }

    public function delete($id)
    {
        // TODO: Implement delete method
    }
}
