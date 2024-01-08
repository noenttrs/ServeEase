<?php

namespace ServeEase\controllers;

use ServeEase\models\AdminManager;
use ServeEase\models\Client;
use ServeEase\models\Product;

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

    function modifyClient()
    {
        if($_SESSION['client']['CLIENT_ROLE'] !== 1){
            header("Location: /");
            return;
        }

        $clientNameValue = $_POST["clientName"];
        $clientSurnameValue = $_POST["clientSurname"];
        $clientMailValue = $_POST["clientMail"];
        $clientPasswordValue = $_POST["clientPassword"];
        $clientFidelityValue = $_POST["clientFidelity"];
        $clientRoleValue = $_POST["clientRole"];
        $clientId = $_POST["clientId"];
        $error = false;

        if(strlen($clientNameValue) > 50) {
            $clientName = "Le prénom ne doit pas dépasser 50 caractères";
            $error = true;
        }

        if(strlen($clientSurnameValue) > 50) {
            $clientSurname = "Le nom de famille ne doit pas dépasser 50 caractères";
            $error = true;
        }

        if(!filter_var($clientMailValue, FILTER_VALIDATE_EMAIL)){
            $clientMail = "L'adresse mail n'est pas valide";
            $error = true;
        }

        if(strlen($clientPasswordValue) > 0) {
            if(strlen($clientPasswordValue) < 8) {
                $clientPassword = "Le mot de passe doit contenir au moins 8 caractères";
                $error = true;
            }
    
            if(!preg_match("#[0-9]+#", $clientPasswordValue)) {
                $clientPassword = "Le mot de passe doit contenir au moins un chiffre";
                $error = true;
            }
        }

        if($error) {
            require VIEWS . "admin/searchClient.php";
            return;
        }


        $client = new Client();
        $client->setClientName($_POST["clientName"]);
        $client->setClientSurname($_POST["clientSurname"]);
        $client->setClientMail($_POST["clientMail"]);

        $client->setClientPassword(strlen($clientPasswordValue) > 0 ? password_hash($_POST["clientPassword"], PASSWORD_DEFAULT) : "");
        $client->setClientFidelity($_POST["clientFidelity"]);
        $client->setClientRole($_POST["clientRole"]);
        $client->setClientId($clientId);

        $adminManager = new AdminManager();
        
        $this->adminManager->modifyClient($client);

        $success = "Le client a bien été modifié";
        require VIEWS . "admin/home.php";
    }

    function createProduct(){
        if($_SESSION['client']['CLIENT_ROLE'] !== 1){
            header("Location: /");
            return;
        }
        
        $productName = $_POST["productName"];
        $productDescription = $_POST["productDescription"];
        $productPrice = $_POST["productPrice"];
        $productImageName = $_FILES["productImage"]["name"];
        $productType = $_POST["productType"];
        $error = false;


        if(strlen($productName) > 50) {
            $productName = "Le nom du produit ne doit pas dépasser 50 caractères";
            $error = true;
        }

        if(strlen($productDescription) > 255) {
            $productDescription = "La description du produit ne doit pas dépasser 255 caractères";
            $error = true;
        }

        if($error) {
            require VIEWS . "admin/home.php";
            return;
        }

        //stocker l'image dans le dossier public/images et récupérer le nom de l'image pour le stocker dans la bdd avec le $_FILES

        if ($_FILES['productImage']["error"] !== UPLOAD_ERR_NO_FILE) {
            $uploaddir = './img/';
            $uploadfile = $uploaddir . basename($_FILES['productImage']['name']);
            move_uploaded_file($_FILES['productImage']['tmp_name'], $uploadfile);
        }

        $product = new Product();
        $product->setProductDescription($productDescription);
        $product->setProductName($productName);
        $product->setProductPrice($productPrice);
        $product->setProductImage($productImageName);
        $product->setProductAllergens(null);
        $product->setProductType($productType);
        $product->setProductTypeMenu(null);





        $adminManager = new AdminManager();
        $adminManager->createProduct($product);

        $success = "Le produit a bien été créé";
        require VIEWS . "admin/home.php";
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
