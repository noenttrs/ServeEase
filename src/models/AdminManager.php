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

    function createProduct($product){

        $productTypeMenu = $product->getProductTypeMenu();
        $productName = $product->getProductName();
        $productImage = $product->getProductImage();
        $productDescription = $product->getProductDescription();
        $productAllergens = $product->getProductAllergens();
        $productPrice = $product->getProductPrice();
        $productType = $product->getProductType();

        $query = $this->db->prepare("INSERT INTO product (PRODUCT_TYPE_MENU, PRODUCT_NAME, PRODUCT_IMAGE, PRODUCT_DESCRIPTION, PRODUCT_ALLERGEN, PRODUCT_PRICE, PRODUCT_TYPE) VALUES (:productTypeMenu, :productName, :productImage, :productDescription, :productAllergens, :productPrice, :productType)");
        $query->execute([
            "productTypeMenu" => $productTypeMenu,
            "productName" => $productName,
            "productImage" => $productImage,
            "productDescription" => $productDescription,
            "productAllergens" => $productAllergens,
            "productPrice" => $productPrice,
            "productType" => $productType
        ]);

        return $query->fetchObject(Product::class);

    }

}
