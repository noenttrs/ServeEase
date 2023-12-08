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
        require VIEWS . "gateway/adminpage.php";
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
