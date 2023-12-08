<?php

namespace ServeEase\models;

use ServeEase\models\Product;

class ProductManager
{

    private $db;

    function __construct() {
        $this->db = new \PDO('mysql:host=' . HOST . ';dbname=' . DATABASE, USER, PASSWORD);
    }

    public function recupProduct()
    {
        $query = $this->db->prepare("SELECT * FROM product");
        $query->execute();
        return $query->fetchAll(\PDO::FETCH_CLASS, Product::class);
    }
}
